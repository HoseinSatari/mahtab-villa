<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Token;
use App\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function showtoken(Request $request)
    {
        if (! $request->session()->has('auth')){
            return redirect(route('login'));
        }
        $request->session()->reflash();
        $this->seo()->setTitle('کد تایید')->setDescription('صفحه کد تایید');
        return view('auth.token');
    }

    public function token(Request $request)
    {
        if (! $request->session()->has('auth')){
            return redirect(route('login'));
        }
        $data = $request->validate([
            'token' => 'required|numeric',
        ]);

        $user =  User::findorfail($request->session()->get('auth.user_id'));

        $status = Token::VerifyCode($request->token , $user);

        if(! $status) {
            toastr()->error('کد وارد شده صحیح نیست یا منقضی شده');
            return redirect(route('login'));
        }

        if(auth()->loginUsingId($user->id,$request->session()->get('auth.remember'))) {
            $user->activeCode()->delete();
            return redirect('/');
        }

    }
}
