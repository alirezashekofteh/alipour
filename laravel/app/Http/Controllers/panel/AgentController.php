<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\Channel;
use App\Models\MembertimeChannel;
use App\Models\Term;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use App\Notifications\SendInstallment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['string', 'max:255'],
            'family' => ['string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => 'نام',
            'family' => 'نام خانوادگی',
            'password' => Hash::make($data['mobile']),
            'mobile' => faTOen($data['mobile']),
        ]);
    }
    public function termsalemobileview()
    {
        return view('Front.panel.agent.newsale');
    }
    public function tokenview()
    {
        return view('Front.panel.agent.token');
    }
    public function termsalemobile(Request $request)
    {
        $request->merge(['mobile' => faTOen($request->mobile)]);
        $this->validator($request->all())->validate();
        $user = User::where('mobile', faTOen($request->mobile))->first();
        if (!$user) {
            $user = $this->create($request->all());
        }
        $request->session()->put('terms', [
            'user_id' => $user->id,
            'remember' => $request->has('remember'),
        ]);
        $code = ActiveCode::generateCode($user);
        $user->notify(new ActiveCodeNotification($code, $user->mobile));
        return redirect(route('panel.agent.token'))->with( ['mobile' => $user->mobile] );
    }
    public function token(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);
        $user = User::Find($request->session()->get('terms.user_id'));
        $status = ActiveCode::verifyCode(faTOen($request->token), $user);

        if (!$status) {
            alert()->error('  کد وارد شده صحیح نبود   ', 'پیغام سیستم')->persistent('تایید');
            return redirect(route('agent.termsalemobile'));
        }
        $user->activeCode()->delete();

        return redirect(route('panel.agent.term.installments'));
    }
    public function terminstallmentsview(Request $request)
    {
        $user = User::find($request->session()->get('terms.user_id'));
        $terms = Term::where('access', 1)->where('installments', '>', '0')->get();
        return view('Front.panel.agent.term', compact('user', 'terms'));
    }
    public function terminstallments(Request $request)
    {
        $user = User::find($request->session()->get('terms.user_id'));
        $terms = Term::find($request->term);

        for ($i = 1; $i < $terms->installments + 1; $i++) {
            $res = $user->transactions()->create([
                'type' => 'credit',
                'amount' => $terms->priceins($user) / $terms->installments,
                'status' => '0',
                'walletable_type' => get_class($terms),
                'walletable_id' => $terms->id,
                'description' => ' خرید اقساطی دوره ' . $terms->title,
                'installments' => $i,
                'created_at' => Carbon::now()->addDays(($i - 1) * 30),
                'updated_at' => Carbon::now()->addDays(($i - 1) * 30),
                'agent' => auth()->user()->id,
                'code'=>  (string)Str::uuid()
            ]);
            if($i==1)
            {
                $user->notify(new SendInstallment($res));
            }
           
          
        }


        alert()->success('  اقساط مورد نظر برای کاربر ایجاد شد       ', 'پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function refferallink()
    {
        $terms = Term::where('access', 1)->get();
        $membertimechannel = MembertimeChannel::all();
        return view('Front.panel.agent.agentlink', compact('terms', 'membertimechannel'));
    }

    public function walletagent()
    {
        $wallets = auth()->user()->validTransactions()->where('description','پورسانت خرید از سایت')->where('amount','>',0)->get();
      
        return view('Front.panel.agent.wallet', compact('wallets'));
    }
    public function walletinstallment()
    {
//         $wallets=DB::table('users')
// ->join('wallets','wallets.agent','=','users.id')
// ->where('installments','>','0')->where('amount','>',0)->where('status',0)->where('agent',auth()->user()->id)->get();
$wallets = Wallet::where('installments','>','0')->where('amount','>',0)->where('status',0)->where('agent',auth()->user()->id)->get();
if ($keyword = request('mobile')) {
   $users=User::whereMobile($keyword)->first();
   $wallets=$users->transactions()->where('installments','>','0')->where('amount','>',0)->where('status',0)->where('agent',auth()->user()->id)->get();
}
return view('Front.panel.agent.walletinstallments', compact('wallets'));
    }
    public function estelams(Request $request)
    {
        $user = User::where('mobile', faTOen($request->mobile))->first();
       $channel=Channel::all();
       $orders=$user->order->where('status',1);
        return view('Front.panel.agent.estelam', compact('channel','orders','user'));
    }
    public function estelam()
    {
        return view('Front.panel.agent.estelam');
    }
    public function sendinstallment(Wallet $wallet)
    {
        $wallet->user->notify(new SendInstallment($wallet));
        alert()->success('  پیامک مورد نظر برای کاربر ارسال شد', 'پیغام سیستم')->persistent('تایید');
        return back();
    }
}
