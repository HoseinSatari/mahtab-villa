<?php

namespace App\Http\Controllers\Admin;

use App\Events\SmsEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function show()
    {
        return view('panel.sms.show');
    }

    public function send(Request $request)
    {
        $data = $request->validate(['text' => ['required']]);

        event(new SmsEvent($request->text));
        toastr()->success('پیامک در حال ارسال شدن به کاربران میباشد');
        return back();
    }
}
