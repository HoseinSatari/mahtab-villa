<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $this->seo()->setTitle('تماس با ما')->setDescription('صفحه تماس با ما خانه مهتاب');
         return view('template.contact');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'text' => ['required'],
        ]);

        Contact::create($data);
        toastr()->success('پیغام شما ارسال شد ، در صورت لزوم همکاران ما با شما تماس برقرار خواهند کرد.');
        return back();

    }
}
