<?php

namespace App\Http\Controllers\Admin;

use App\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DateController extends Controller
{
    public function index()
    {
        $dates = Date::all();
       return view('panel.villa.index_date' , compact('dates'));
    }

    public function delete(Date $date)
    {
       $date->delete();
       toastr()->success('با موفقیت حذف شد');
       return back();
    }

    public function show()
    {
        return view('panel.villa.date');
    }

    public function post(Request $request)
    {
        $data = $request->validate([
            'start' => ['required'],
            'date' => ['required'],
        ], [], ['date' => 'تاریخ']);

        $data['date'] = convertPersianToEnglish($data['date']);
        $data['date'] = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y-m-d', $data['date']);
        $data['start'] = convertPersianToEnglish($data['start']);
        $data['start'] = \Morilog\Jalali\CalendarUtils::createDatetimeFromFormat('Y-m-d', $data['start']);
        Date::create($data);
        toastr()->success('این تاریخ با موفقیت بسته شد');
        return redirect(route('admin.vila.index'));
    }
}
