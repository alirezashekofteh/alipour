<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function showToken(Request $request)
    {
        if (!$request->session()->has('auth')) {
            return redirect(route('login'));
        }

        $request->session()->reflash();

        return view('auth.token');
    }

    public function token(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        if (!$request->session()->has('auth')) {
            return redirect(route('login'));
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));
        $status = ActiveCode::verifyCode(faTOen($request->token), $user);

        if (!$status) {
            alert()->error('  کد وارد شده صحیح نبود   ', 'پیغام سیستم')->persistent('تایید');
            return redirect(route('login'));
        }

        if (auth()->loginUsingId($user->id, $request->session()->get('auth.remember'))) {
            $user->activeCode()->delete();
            if (session()->get('type') == 'purchase') {
                return redirect(route(session()->get('route'), session()->get('value')));
            }
            if (session()->has('dataurl')) {
                return redirect(session()->get('dataurl'));
            }
            if (session()->has('url.intended')) {
                return redirect(session()->get('url.intended'));
            }
            return redirect(route('index'));
        }
        alert()->error('  کد وارد شده صحیح نبود   ', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('login'));
    }
}
