<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {

           $this->middleware('permission:user-list', ['only' => ['index']]);
           $this->middleware('permission:user-add', ['only' => ['create','store']]);
           $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:user-delete', ['only' => ['destroy']]);
           $this->middleware('permission:user-excel', ['only' => ['export']]);
           $this->middleware('permission:user-login', ['only' => ['logintopanel']]);
           $this->middleware('permission:user-order', ['only' => ['UserOrder']]);
           $this->middleware('permission:user-channel', ['only' => ['UserChannels']]);
           $this->middleware('permission:user-wallet', ['only' => ['UserWalletform','UserWallet']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        if ($keyword = request('search')) {
            $users->where('mobile', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%")->orWhere('family', 'LIKE', "%{$keyword}%");
        }
        $users = $users->latest()->paginate(25);
        foreach($users as $aa)
        {
            if($aa->loginid==null)
            {
            $aa->update([
                'loginid' =>(string)Str::uuid(),
            ]);
        }
        }
        return view('Admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $userRole = array();
        return view('Admin.user.create',compact('roles','userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'email'=>[],
        ]);

        $user=User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'password' => Hash::make($data['mobile']),
            'mobile' => faTOen($data['mobile']),
            'email'=>$data['email'],
        ]);
        $user->syncRoles($request->input('roles'));
        alert()->success('  ثبت با موفقیت انجام شد   ', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.user.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return User
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('Admin.user.edit', compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        $request->merge(['superuser' => $request->has('superuser')]);
        if($request->type=='agent' and  $user->refcode==null)
        {
        $request->merge(['refcode' => (string)Str::uuid()]);   
        }
        $user->update($request->all());
        $user->channelmanag()->sync($request->channels);
        $user->syncRoles($request->input('roles'));
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.user.index'));
    }
    public function UserWallet(Request $request, User $user)
    {

        $res = $user->transactions()->create([
            'type' => $request->noe,
            'amount' => $request->amount,
            'status' => '1',
            'description'=>$request->description,
        ]);
        alert()->success('  مدیریت کیف پول با موفقیت انجام شد   ', 'پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function UserWalletform(User $user)
    {
        $wallets=$user->validtransactions()->where('amount','>',0)->get();
        return view('Admin.userwallet.create', compact('user','wallets'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        alert()->success('حذف با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return back();
    }

    public function import()
    {
        return Excel::import(new UsersImport, storage_path('app/public/users.xlsx'));
    }
    public function UserOrder(User $user)
    {
        $orders=$user->order()->latest()->paginate(25);
        $price=$orders->where('description','online')->sum('price');
        $count=$orders->count();
        return view('Admin.orders.index',compact(['orders','price','count']));
    }
    public function UserChannels(User $user)
    {
        $channels=$user->channels()->latest()->get();
  
        return view('Admin.channel.list',compact(['channels','user']));
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function logintopanel(User $user)
    {
        Auth::login($user);
        return redirect(route('panel.index'));
    }
    // public function dores()
    // {
    //     $users=User::where('staff','1')->get();
    //     foreach($users as $user)
    //     {
    //         if(!$user->order()->where('term_id',3)->count())
    //         {
    //             $order = $user->order()->create([
    //                 'resnumber' => 1,
    //                 'term_id' =>3,
    //                 'price' => 0,
    //                 'status' => 1,
    //             ]);
    //         }
    //     }

    // }
}
