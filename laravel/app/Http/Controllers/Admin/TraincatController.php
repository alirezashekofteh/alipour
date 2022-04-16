<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PostTraincat;
use App\Models\Traincat;
use Illuminate\Http\Request;

class TraincatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:traincat-list', ['only' => ['index']]);
           $this->middleware('permission:traincat-add', ['only' => ['create','store']]);
           $this->middleware('permission:traincat-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:traincat-delete', ['only' => ['destroy']]);
           $this->middleware('permission:traincat-post', ['only' => ['getpost','destroytrainpost','setpost']]);
    }
    public function index()
    {
        $traincat = Traincat::query();

        if ($keyword = request('search')) {
            $traincat->where('name', 'LIKE', "%{$keyword}%");
        }

       

        $traincat = $traincat->latest()->paginate(25);

       return view('Admin.traincat.index',compact('traincat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.traincat.create');
    }

    public function getpost(Traincat $traincat)
    {

        $trainpost=$traincat->posts()->orderBy('tartib','ASC')->get();
        return view('Admin.traincat.post',compact('trainpost','traincat'));
    }
    public function setpost(Traincat $traincat, Request $request)
    {

       PostTraincat::create([
            'post_id'=>$request->post_id,
            'tartib' =>$request->tartib,
            'traincat_id'=>$traincat->id,
        ]);
       return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $train=Traincat::create($request->all());
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traincat  $traincat
     * @return \Illuminate\Http\Response
     */
    public function show(Traincat $traincat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traincat  $traincat
     * @return \Illuminate\Http\Response
     */
    public function edit(Traincat $traincat)
    {
        return view('Admin.traincat.edit',compact('traincat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traincat  $traincat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traincat $traincat)
    {
      
        $traincat->update($request->all());
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.traincat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traincat  $traincat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traincat $traincat)
    {
        $traincat->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function destroytrainpost(PostTraincat $trainpost)
    {
        $trainpost->delete();
        alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return back();
    }
    public function tartib(Request $request)

    {

        $post = PostTraincat::find($request->id);
        $post->tartib = $request->tartib;
        $post->save();
        return response()->json(['success'=>'تغییرات با موفقیت ذخیره شد.']);

    }
    
}
