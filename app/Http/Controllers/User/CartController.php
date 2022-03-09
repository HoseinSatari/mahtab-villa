<?php

namespace App\Http\Controllers\User;

use App\Date;
use App\Http\Controllers\Controller;
use App\Order;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function check(Request $request)
    {
        $data = $request->validate([
            'start' => ['required'],
            'end' => ['required'],
            'qty' => ['required'],
        ]);

        $data['start'] = convertPersianToEnglish($data['start']);
        $data['end'] = convertPersianToEnglish($data['end']);

        if ($data['start'] < jdate()->format('Y-m-d') and $data['end'] < jdate()->format('Y-m-d')) {
            toastr()->error('تاریخ انتخابی باید از امروز به بعد باشد.');
            return back();
        }
        if ($data['start'] == $data['end']) {
            toastr()->error('تاریخ شروع باید بزرگتر از تاریخ پایان باشد');
            return back();
        }
        if ($data['start'] > $data['end']) {
            toastr()->error('تاریخ شروع باید بزرگتر از تاریخ پایان باشد');
            return back();
        }
        foreach (Order::orwhere('status' , 'paid')->orwhere('status' , 'prepartion')->orwhere('status' , 'end')->where('start', '>=', now()->format('Y-m-d'))->get() as $dateorder) {
            if ($data['start'] < jdate($dateorder->start)->format('Y-m-d')) {
                if ($data['end'] > jdate($dateorder->start)->format('Y-m-d')) {
                    toastr()->error('لطفا تاریخ انتخابی خود را درست کنید تاریخ پایان یا روز های بین قبلا رزرو شده');
                    return back();
                }
            } elseif ($data['start'] > jdate($dateorder->start)->format('Y-m-d')) {
                if ($data['start'] >= jdate($dateorder->end)->format('Y-m-d')) {
                    if ($data['end'] < jdate($dateorder->end)->format('Y-m-d')) {
                        toastr()->error('لطفا تاریخ انتخابی خود را درست کنید تاریخ پایان یا روز های بین قبلا رزرو شده');
                        return back();
                    }
                } else {
                    toastr()->error('لطفا تاریخ انتخابی خود را درست کنید تاریخ شروع یا روز های بین قبلا رزرو شده');
                    return back();
                }
            } elseif($data['start'] == jdate($dateorder->start)->format('Y-m-d')) {
                toastr()->error('این تاریخ قبلا رزرو شده');
                return back();
            }else{
                toastr()->error('مشکلی در تاریخ انتخابی بوجود امده است لطفا با پشتیبانی سایت در تماس باشید.');
                return back();
            }
        }

        foreach (Date::where('start', '>=', now()->format('Y-m-d'))->get() as $dateorder) {
            if ($data['start'] < jdate($dateorder->start)->format('Y-m-d')) {
                if ($data['end'] > jdate($dateorder->start)->format('Y-m-d')) {
                    toastr()->error('لطفا تاریخ انتخابی خود را درست کنید تاریخ پایان یا روز های بین قبلا رزرو شده');
                    return back();
                }
            } elseif ($data['start'] > jdate($dateorder->start)->format('Y-m-d')) {
                if ($data['start'] >= jdate($dateorder->date)->format('Y-m-d')) {
                    if ($data['end'] < jdate($dateorder->date)->format('Y-m-d')) {
                        toastr()->error('لطفا تاریخ انتخابی خود را درست کنید تاریخ پایان یا روز های بین قبلا رزرو شده');
                        return back();
                    }
                } else {
                    toastr()->error('لطفا تاریخ انتخابی خود را درست کنید تاریخ شروع یا روز های بین قبلا رزرو شده');
                    return back();
                }
            } elseif($data['start'] == jdate($dateorder->start)->format('Y-m-d')) {
                toastr()->error('این تاریخ قبلا رزرو شده');
                return back();
            }else{
                toastr()->error('مشکلی در تاریخ انتخابی بوجود امده است لطفا با پشتیبانی سایت در تماس باشید.');
                return back();
            }
        }
        $price = datediff($data['start'], $data['end']) * vv()->price;
        $day = datediff($data['start'], $data['end']);

        $data['start'] = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y-m-d', $data['start']);
        $data['end'] = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y-m-d', $data['end']);

        $period = new DatePeriod(
            $data['start'],
            new DateInterval('P1D'),
            $data['end']
        );
        $avl = 0;
        $dvm = 0;
        foreach ($period as $per) {
            if (jdate($per)->format('l') == 'شنبه' or jdate($per)->format('l') == 'یکشنبه' or jdate($per)->format('l') == 'دوشنبه' or jdate($per)->format('l') == 'سه شنبه') {
                $avl += 1;
            } elseif (jdate($per)->format('l') == 'چهارشنبه' or jdate($per)->format('l') == 'پنجشنبه' or jdate($per)->format('l') == 'جمعه') {
                $dvm += 1;
            }
        }
        $avl = $avl * vv()->price2;
        $dvm = $dvm * vv()->price;

        $request->session()->flash('order', [
            'start' => $data['start'],
            'end' => $data['end'],
            'qty' => $data['qty'],
            'price' => (int)$avl+$dvm,
            'day' => $day
        ]);
        return redirect(route('order.cart'));

    }


    public function cart(Request $request)
    {
        if (!$request->session()->has('order')) {
            toastr()->warning('لطفا فیلد های رزرو را پر کنید');
            return redirect(route('home'));
        }
        $request->session()->reflash();
        $this->seo()->setTitle('رزرو شما');
        return view('user.cart');
    }
}
