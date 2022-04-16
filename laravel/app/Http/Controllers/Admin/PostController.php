<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:post-list', ['only' => ['index']]);
           $this->middleware('permission:post-add', ['only' => ['create','store']]);
           $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $post = post::query();
$datesort='created_at';
        if ($keyword = request('search')) {
            // $post->where('name', 'LIKE', "%{$keyword}%")->orWhere('content', 'LIKE', "%{$keyword}%")->orWhere('fullcontent', 'LIKE', "%{$keyword}%");
            $post->where('name', 'LIKE', "%{$keyword}%");
            $datesort=request('sort');
        }
        if (request('sort')) {
            $datesort=request('sort');
        }
        $post = $post->orderBy($datesort,'desc')->paginate(25);

        return view('Admin.post.index',compact('post'));
        $posts = post::whereDate('created_at', Carbon::today())->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Storage::disk('s3')->putFileAs('test' , $request->file('file'), $request->file('file')->getClientOriginalName());


        $request->merge(['comment' => $request->has('comment')]);
        $request->merge(['noti' => $request->has('noti')]);
        $request->merge(['active' => $request->has('active')]);
        $post = auth()->user()->post()->create(
            [
                'name' => $request->name,
                'content' => $request->content,
                'fullcontent'=>$request->fullcontent,
                'active' => $request->active,
                'comment' => $request->comment,
                'noti' => $request->noti,
                'video' => $request->video,
                'type' => $request->type,
                'cover'=>$request->cover,
                'title' => $request->title,
                'description'=>$request->description,
            ]
        );
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $post->images()->create([
                    'name' => $value['names'],
                    'pic' => $value['pic'],
                ]);
            }
        }
         $post->category()->sync($request->category);
         $sitemap=new SitemapController;
         $sitemap->posts($post);
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $images = $post->images()->get();
        return view('Admin.post.edit',compact(['post','images']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

        $request->merge(['comment' => $request->has('comment')]);
        $request->merge(['noti' => $request->has('noti')]);
        $request->merge(['active' => $request->has('active')]);
        $post->update(
            [
                'name' => $request->name,
                'slug' => $request->slug,
                'content' => $request->content,
                'fullcontent'=>$request->fullcontent,
                'active' => $request->active,
                'comment' => $request->comment,
                'noti' => $request->noti,
                'video' => $request->video,
                'type' => $request->type,
                'cover'=>$request->cover,
                'title' => $request->title,
                'description'=>$request->description,
                'user_id'=>auth()->user()->id,
            ]
        );
        $post->images()->delete();
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $post->images()->create([
                    'name' => $value['names'],
                    'pic' => $value['pic'],
                ]);
            }
        }
        $post->category()->sync($request->category);
        $sitemap=new SitemapController;
        $sitemap->posts($post);
        
        alert()->success('ویرایش  با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.post.index'));
    }
    public function changeSardabir(Request $request)

    {

        $post = post::find($request->post_id);
        $post->sardabir = $request->status;
        $post->save();
        return response()->json(['success'=>'تغییرات با موفقیت ذخیره شد.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
     $post->delete();
     alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
     return back();

    }
}
