<?php

namespace App\Http\Controllers;

use App\Exports\UserCampExport;
use App\Models\ActiveCode;
use App\Models\User;
use App\Notifications\SendAftherUserCamp;
use App\Notifications\SendUserCamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ActiveCode as ActiveCodeNotification;

class UserCampController extends Controller
{

    public function index()
    {
        $users = UserCamp::query();

        if ($keyword = request('search')) {
            $users->where('mobile', 'LIKE', "%{$keyword}%");
        }
        $users = $users->where('active', 1)->latest()->paginate(25);
        return view('Admin.usercamp.index', compact('users'));
    }
    public function export()
    {
        return Excel::download(new UserCampExport, 'usercamps.xlsx');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
         'mobile' => ['required', 'string', 'max:255'],
        ]);
        // $code = mt_rand(1000, 9999);
        // $user=UserCamp::create([
        //     'active' => 0,
        //     'mobile' => faTOen($data['mobile']),
        //     'code'=>$code,
        // ]);
        // $request->session()->flash('camp', [
        //     'user_id' => $user->id,
        //     'mobile' => $user->mobile
        // ]);
        // Notification::send($user, new SendUserCamp($code,$data['mobile']));
        // alert()->success('   کد تایید برای شما ارسال شد      ', 'پیغام سیستم')->persistent('تایید');
        // return redirect(route('token.usercamp'));

        $user = User::where('mobile', faTOen($request->mobile))->first();
        if (!$user) {
            $user=User::create([
                'name' => '',
                'family' => '',
                'password' => Hash::make($data['mobile']),
                'mobile' => faTOen($data['mobile']),
            ]);
        }
        $request->session()->flash('auth', [
            'user_id' => $user->id,
            'remember' => $request->has('remember'),
        ]);
        $code = ActiveCode::generateCode($user);
        $user->notify(new ActiveCodeNotification($code, $user->mobile));
         alert()->success('   کد تایید برای شما ارسال شد      ', 'پیغام سیستم')->persistent('تایید');
         return redirect(route('token.usercamp'));
    }
    public function token(Request $request)
    {
        if (!$request->session()->has('auth')) {
            return redirect(route('landing3'));
        }
        $request->session()->reflash();
        return view('Front.landing.token3');
    }
    public function tokenpost(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        if (!$request->session()->has('auth')) {
            return redirect(route('landing3'));
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));
        $status = ActiveCode::verifyCode(faTOen($request->code), $user);
        if (!$status) {
            alert()->error('  کد وارد شده صحیح نبود   ', 'پیغام سیستم')->persistent('تایید');
            return redirect(route('landing3'));
        }
        if (auth()->loginUsingId($user->id, $request->session()->get('auth.remember'))) {
            $user->activeCode()->delete();
            return redirect('https://app.didar.me/customer/form/dc6f0fac-7bf2-4ed1-9a34-54618b6ea54b');
        }
        // if ($user) {
        //     $user->active = 1;
        //     $user->save();
        //     Notification::send($user, new SendAftherUserCamp($user->mobile));
        //     alert()->success('  ثبت اطلاعات با موفقیت انجام شد       ', 'پیغام سیستم')->persistent('تایید');
        //     return redirect('https://app.didar.me/customer/form/b06876c5-449a-422b-8f85-c66129f61384');
        // }
        alert()->error('  کد وارد شده صحیح نبود   ', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('landing3'));
    }
}
