<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Events\support;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show_contact')->only(['index']);
        $this->middleware('can:update_contact')->only(['approved']);
        $this->middleware('can:delete_contact')->only(['delete']);
        $this->middleware('can:send_sms')->only(['send']);


    }
    public function index()
    {
        $contacts = Contact::query();

        if ($keyword = \request()->search) {
            $contacts = $contacts->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('phone', 'LIKE', "%{$keyword}%");
        }
        $contacts = $contacts->orderBy('approved', 'asc')->paginate();
        $contacts->appends(\request()->query())->links();
        return view('panel.contact.index', compact('contacts'));

    }

    public function approved(Contact $id)
    {
        if (!$id->approved) {
            $id->update(['approved' => '1']);
        }
        toastr()->success('با موفقیت دیده شد');
        return back();
    }

    public function send(Contact $id)
    {
        return view('panel.contact.send_sms', compact('id'));
    }

    public function send_sms(Request $request, Contact $id)
    {
        $data = $request->validate([
            'phone' => ['required'],
            'subject' => ['required'],
            'text' => ['required'],
        ]);

       event(new \App\Events\Contact($data));

        toastr()->success('پیامک با موفقیت ارسال شد');
        return redirect(route('admin.contact.index'));
    }

    public function delete(Contact $id)
    {

        $id->delete();
        toastr()->success('با موفقیت حذف شد');
        return back();
    }
}
