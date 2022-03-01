<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_option')->only(['index']);


    }
    public function index()
    {
        $option = Option::find(1);

        return view('panel.option.index', compact('option'));
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'sitename' => ['required'],
            'image'  => ['required'],
            'description' => ['required'],
            'keyword' => ['required'],
            'phone' => ['required'],
            'phoneadmin' => ['required'],
            'location' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'instagram' => ['required'],
            'whatsup' => ['required'],
            'telegram' => ['required'],
            'about' =>['required'],
        ]);

        $option = Option::find(1);
        $option->update($data);

        toastr()->success('تنظیمات با موفقیت اعمال شدند');
        return back();
    }
}
