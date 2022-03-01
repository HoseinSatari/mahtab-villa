<?php

namespace App\Http\Controllers\Admin;

use App\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function show()
    {
        return view('panel.villa.date');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'date' => ['required'],
        ], [], [ 'date' => 'تاریخ']);

        $data['date'] = convertPersianToEnglish($data['date']);
        $data['date'] = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y-m-d', $data['date']);
        Date::create($data);
        toastr()->success('این تاریخ با موفقیت بسته شد');
        return redirect(route('admin.vila.index'));
    }
}
