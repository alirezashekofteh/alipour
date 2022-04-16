<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\MembertimeChannel;
use Illuminate\Support\Str;

class AgentController extends Controller
{

    public function __construct()
    {

           $this->middleware('permission:agent-list', ['only' => ['index']]);
           $this->middleware('permission:agent-term', ['only' => ['referrallink']]);
           $this->middleware('permission:agent-channel', ['only' => ['referrachannelllink']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        $users=$users->where('type','agent');

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
        return view('Admin.agent.create');
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
        ]);

        User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'password' => Hash::make($data['mobile']),
            'mobile' => faTOen($data['mobile']),
            'type'=>'agent',
        ]);
        alert()->success('  ثبت با موفقیت انجام شد   ', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.agent.create'));
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
     * @param User agent
     * @return User
     */
    public function edit(User $agent)
    {
        return view('Admin.agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User agent
     * @return void
     */
    public function update(Request $request, User $agent)
    {
        $request->merge(['superuser' => $request->has('superuser')]);
        $agent->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.user.index'));
    }
   
  
    /**
     * Remove the specified resource from storage.
     *
     * @param User agent
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $agent)
    {
        $agent->delete();
        alert()->success('حذف با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function referrallink(User $agent)
    {
        $terms=Term::all();
       return view('Admin.agent.referral',compact('agent','terms'));
    }
    public function referrachannelllink(User $agent)
    {
        $membertimechannel = membertimechannel::query();
        $membertimechannel = $membertimechannel->latest()->paginate(25);
       return view('Admin.agent.channel',compact('agent','membertimechannel'));
    }
}
