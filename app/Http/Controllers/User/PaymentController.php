<?php

namespace App\Http\Controllers\User;
use App\Events\StoreOrder;
use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment as shetabitPayment;

class PaymentController extends Controller
{
    public function callback(Request $request)
    {

        try {
            if ($request->ResCode == 0) {
                $pay = Payment::where('resnumber', $request->RefId)->firstOrFail();
                auth()->loginUsingId($pay->order->user->id);
                $receipt = shetabitPayment::via('behpardakht')->amount($pay->order->price)->transactionId($request->RefId)->verify();

                $pay->update([
                    'status' => 1
                ]);

                $pay->order()->update([
                    'status' => 'paid'
                ]);

                event(new StoreOrder($pay->order->user->phone , number_format($pay->order->price) , jdate($pay->order->start)->format('%Y-%m-%d') , jdate($pay->order->end)->format('%Y-%m-%d') , $pay->order->code));
                toastr()->success('سفارش شما ثبت شد');
                return redirect(route('user.order'));
            } else {
                $pay = Payment::where('resnumber', $request->RefId)->firstOrFail();
                $pay->order->discount()->detach();
                $pay->order->delete();
                $pay->delete();
                auth()->loginUsingId($pay->order->user->id);
                toastr()->error("پرداخت شما ناموفق بود و سفارش شما لغو شد");
                return redirect(route('user.order'));
            }
        } catch (InvalidPaymentException $e) {

            toastr()->error("پرداخت شما ناموفق بود و سفارش شما لغو شد");
            return redirect(route('user.order'));
        }
    }
}
