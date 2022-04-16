<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TermContent;
use App\Models\Term;

class TermContentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Term $term)
    {
       $termcontent=$term->termcontents()->latest()->paginate(25);

       return view('Admin.termcontent.index',compact('termcontent','term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Term $term)
    {
        return view('Admin.termcontent.create',compact('term'));
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
        $term->termcontents()->create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermContent  $termcontent
     * @return \Illuminate\Http\Response
     */
    public function show(TermContent $termcontent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermContent  $termcontent
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term,TermContent $content)
    {
        return view('Admin.termcontent.edit',compact('content','term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermContent  $termcontent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Term $term, TermContent $content)
    {
        $content->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.term.content.index',$term));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermContent  $termcontent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term,TermContent $content)
    {
        $content->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
