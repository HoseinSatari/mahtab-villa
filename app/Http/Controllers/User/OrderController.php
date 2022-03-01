<?php

namespace App\Http\Controllers\User;

use App\Discount;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as shetabitPayment;

class OrderController extends Controller
{
    public function order()
    {
        $this->seo()->setTitle('رزرو های شما');
        return view('user.order');
    }

    public function store(Request $request)
    {
        if (!$request->session()->has('order')) {
            toastr()->warning('لطفا فیلد های رزرو را پر کنید');
            return redirect(route('home'));
        }
        $request->session()->reflash();
        $data[] = null;
        if (!Auth::check()) {
            $data = $request->validate([
                'phone' => ['required', 'numeric', 'ir_mobile:zero'],
            ]);
            $user = User::firstOrCreate(['phone' => $data['phone']]);
            $user = User::find($user->id);
            auth()->loginUsingId($user->id);
            $request->session()->reflash();

        }

        $data += $request->validate([
            'discount' => ['nullable'],
            'descrip' => ['nullable'],
        ]);

        $code = false;
        if (isset($request->discount) and $request->discount != null) {
            $code = Discount::wherecode($request->discount)->first();
            if ($code) {
                $status = auth()->user()->discount()->where('discount_id', $code->id)->get()->first();
                if (isset($status)) {
                    $code = false;
                } elseif ($code->expired_at < now()) {
                    $code = false;
                }
            }
        }

        $order = auth()->user()->orders()->create([
            'status' => 'unpaid',
            'qty' => $request->session()->get('order.qty'),
            'price' => $code ? $code->value($request->session()->get('order.price')) : $request->session()->get('order.price'),
            'start' => $request->session()->get('order.start'),
            'end' => $request->session()->get('order.end'),
            'code' => code(),
            'descrip' => $data['descrip'] ?? '',

        ]);
        if ($code) {
            auth()->user()->discount()->attach($code->id, ['order_id' => $order->id]);
        }

        $invoice = (new Invoice)->amount($order->price);
        return shetabitPayment::via('behpardakht')->callbackUrl(route('payment.callback'))->purchase($invoice, function ($driver, $transactionId) use ($order, $invoice) {

            $order->payment()->create([
                'resnumber' => $transactionId,
            ]);
        })->pay()->render();

    }

    public function check_discount(Request $request)
    {
        if (!$request->session()->has('order')) {
            return redirect(route('home'));
        }
        $request->session()->reflash();
        $discount = Discount::wherecode($request->discount)->first();
        if (!$discount) {
            return response(['error' => 'کد تخفیف معتبر نیست']);
        }
        if ($discount->expired_at < now()) {
            return response(['error' => 'زمان استفاده از این کد به پایان رسیده است']);
        }
        if (auth()->check()) {
            if (auth()->user()->discount()->where('discount_id', $discount->id)->get()->first()) {
                return response(['error' => 'شما قبلا از این کد استفاده کردید']);
            }
        }

        if ($discount->type == 'Percen') {
            return response(['success' => 'کد معتبر است و میتوانید استفاده کنید', 'total' => number_format(request()->session()->get('order.price') - (request()->session()->get('order.price') / 100) * $discount->value)]);
        } elseif ($discount->type == 'int') {
            return response(['success' => '  کد معتبر است و میتوانید استفاده کنید', 'total' => number_format(request()->session()->get('order.price') - $discount->value)]);
        }


    }
}
