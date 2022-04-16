<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metapost;
use App\Models\post;
use Illuminate\Http\Request;

class MetapostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
       $metapost=$post->metapost()->latest()->paginate(25);

       return view('Admin.metapost.index',compact('metapost','post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('Admin.metapost.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'name'=>'required',
            'content' => 'required_if:noe,content',
            'code'=>'required_if:noe,code',
            'tartib'=>'required',
            'file'=>'required_if:noe,padcast|required_if:noe,video|required_if:noe,images',
            'noe' => 'required'
        ]);
        $metapost=$post->metapost()->create($data);
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metapost  $metapost
     * @return \Illuminate\Http\Response
     */
    public function show(Metapost $metapost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metapost  $metapost
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,Metapost $metapost)
    {
        return view('Admin.metapost.edit',compact('metapost','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metapost  $metapost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post, Metapost $metapost)
    {
        $data = $request->validate([
            'name'=>'required',
            'content' => 'required_if:noe,content',
            'code'=>'required_if:noe,code',
            'tartib'=>'required',
            'file'=>'required_if:noe,padcast|required_if:noe,video|required_if:noe,images',
            'noe' => 'required'
        ]);
        $metapost->update($data);
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.post.metapost.index',$post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metapost  $metapost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,Metapost $metapost)
    {
        $metapost->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
}
