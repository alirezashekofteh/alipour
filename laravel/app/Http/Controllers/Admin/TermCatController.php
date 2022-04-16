<?php

namespace App\Http\Controllers\Admin;

use App\Models\TermCat;
use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class TermCatController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:term-category', ['only' => ['index','create','store','edit','update','destroy']]);
    }
    public function index(Term $term)
    {
       $termcat=$term->termcats()->latest()->paginate(25);

       return view('Admin.termcat.index',compact('termcat','term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Term $term)
    {
        return view('Admin.termcat.create',compact('term'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Term $term)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $term->termcats()->create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermCat  $termcat
     * @return \Illuminate\Http\Response
     */
    public function show(TermCat $termcat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermCat  $termcat
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term,TermCat $termcat)
    {
        return view('Admin.termcat.edit',compact('termcat','term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermCat  $termcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Term $term, TermCat $termcat)
    {
        if($request->installments>0)
        {
            $values = Video::where('termcat_id', $termcat->id)->update(['installments'=>$request->installments]);
            
        }
        $termcat->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.term.termcat.index',$term));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermCat  $termcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term,TermCat $termcat)
    {
        $termcat->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
