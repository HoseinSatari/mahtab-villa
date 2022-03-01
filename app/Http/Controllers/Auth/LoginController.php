<?php

namespace App\Http\Controllers\Auth;

use App\Events\TokenEvent;
use App\Http\Controllers\Controller;
use App\Token;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showform()
    {
        $this->seo()->setTitle('ورود | ثبت نام')->setDescription('صفحه ورود یا ثبت نام');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate(['phone' => ['required', 'ir_mobile:zero']]);

        $user = User::wherephone($data['phone'])->first();

        if (!$user) {
            $data = $request->validate(['phone' => ['unique:users,phone']]);
            $user = User::create(['phone' => $data['phone']]);
        }
        $request->session()->flash('auth', [
            'user_id' => $user->id,
            'remember' => $request->has('remember'),
        ]);
        $code = Token::generateCode($user);

        event(new TokenEvent($user->phone , $code));

        return redirect(route('auth.token'));

    }
}
