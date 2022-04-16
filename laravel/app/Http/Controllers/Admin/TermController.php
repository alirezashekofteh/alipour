<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:term-list', ['only' => ['index']]);
           $this->middleware('permission:term-add', ['only' => ['create','store']]);
           $this->middleware('permission:term-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:term-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $term = Term::query();
        $term = $term->latest()->paginate(25);

        return view('Admin.term.index',compact('term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms=Term::all();
        return view('Admin.term.create',compact('terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['access' => $request->has('access')]);
        $term = auth()->user()->term()->create($request->all());
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $term->questions()->create([
                    'name' => $value['names'],
                    'value' => $value['pasokh'],
                ]);
            }
        }
        $term->channel()->sync($request->channel);
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(term $term)
    {
        $terms=Term::all();
        $images = $term->questions()->get();
        return view('Admin.term.edit',compact(['term','terms','images']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Term $term)
    {
        $request->merge(['access' => $request->has('access')]);
        $request->merge(['vip' => $request->has('vip')]);
        $term->update($request->all());
        $term->questions()->delete();
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $term->questions()->create([
                    'name' => $value['names'],
                    'value' => $value['pasokh'],
                ]);
            }
        }
        $term->channel()->sync($request->channel);
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.term.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
     $term->delete();
     alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
     return back();

    }
}
