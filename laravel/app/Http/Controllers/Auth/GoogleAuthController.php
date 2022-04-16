<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use carbon\carbon;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public  function callback()
    {
        try {
            $googleuser=Socialite::driver('google')->user();
            $user=User::where('email',$googleuser->email)->first();
            if(!$user)
            {
                $user=User::create([
                    'name'=>$googleuser->name,
                    'email'=>$googleuser->email,
                    'password'=>bcrypt('123456'),
                    'email_verified_at' => carbon::now(),
                ]);
            }
            auth()->loginUsingId($user->id);
           return redirect('/');
        }catch (\Exception $e )
        {
            alert()->error('erro','error');
            return redirect('/login');
        }

    }
}
