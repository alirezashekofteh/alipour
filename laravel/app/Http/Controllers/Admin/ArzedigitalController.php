<?php

namespace App\Http\Controllers\Admin;

use App\Models\Arzedigital;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArzedigitalRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateArzedigitalRequest;

class ArzedigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arzedigital = Arzedigital::query();
        if ($keyword = request('search')) {
           $arzedigital= $arzedigital->where('name', 'LIKE', "%{$keyword}%");
        }
        $arzedigital = $arzedigital->latest()->paginate(25);
        return view('Admin.arzedigital.index',compact('arzedigital'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.arzedigital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['active' => $request->has('active')]);
        $arzedigital=Arzedigital::create($request->all());
        $arzedigital->realtimechart()->create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arzedigital  $arzedigital
     * @return \Illuminate\Http\Response
     */
    public function show(Arzedigital $arzedigital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arzedigital  $arzedigital
     * @return \Illuminate\Http\Response
     */
    public function edit(Arzedigital $arzedigital)
    {
        $real=$arzedigital->realtimechart;
        return view('Admin.arzedigital.edit', compact(['arzedigital','real']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\arzedigital  $arzedigital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arzedigital $arzedigital)
    {
        $request->merge(['active' => $request->has('active')]);
        $arzedigital->update($request->all());
        $arzedigital->realtimechart->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.arzedigital.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arzedigital  $arzedigital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arzedigital $arzedigital)
    {
        $arzedigital->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
