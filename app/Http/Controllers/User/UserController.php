<?php

namespace App\Http\Controllers\User;

use App\Events\TokenEvent;
use App\Http\Controllers\Controller;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', ['user' => auth()->user()]);
    }

    public function edit(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
        ]);

        $user = \auth()->user();

        $user->update(['name' => $data['name']]);
        if ($user->phone != $data['phone']) {
            $request->validate(['phone' => Rule::unique('users')]);
            $code = Token::generateCode($user);
            event(new TokenEvent($data['phone'] , $code));
            $request->session()->flash('auth', ['user' => $user->id, 'phone' => $request->phone, 'code' => $code]);
            return redirect(route('user.token'));
        }
        toastr()->success('اطلاعات شما با موفقیت تایید شد');
        return redirect(route('user'));
    }

    public function token(Request $request)
    {
        if (session()->has('auth')) {
            $request->session()->reflash();
            $this->seo()->setTitle(' تایید کد');
            return view('user.token');
        } else {
            return redirect(route('user.edit'));
        }
    }

    public function ValidToken(Request $request)
    {
        if ($request->session()->has('auth')) {
            $data = $request->validate([
                'code' => 'required',
            ], [], ['code' => 'کد']);

            $user = User::findOrFail($request->session()->get('auth.user'));

            $status = Token::verifyCode($data['code'], $user);

            if (!$status) {
                toastr()->error('کد وارد شده صحیح نبود.');
                return redirect(route('user'));
            }
            $user->update(['phone' => $request->session()->get('auth.phone')]);

            $user->activeCode()->delete();
            toastr()->success('شماره موبایل شما با موفقیت تایید شد');
            return redirect(route('user'));
        } else {
            toastr()->error('شما اجازه دسترسی به صفحه رو ندارید');
            return redirect(route('user'));
        }
    }

    public function logout(Request $request)
    {
        if (auth()->check()):
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        endif;
    }
}
