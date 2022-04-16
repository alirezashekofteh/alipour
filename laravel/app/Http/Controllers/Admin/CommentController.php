<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(post $post)
    {
        $comment=$post->comments()->where('parent_id','0')->latest()->paginate(25);
        return view('Admin.post.comment',compact('comment'));
    }
    public function indexAll()
    {
        $comment=Comment::where('parent_id','0')-> latest()->paginate(25);
        return view('Admin.comment.comment',compact('comment'));
    }
    public function CommentReply(Comment $comment)
    {
        $reply=Comment::where('parent_id',$comment->id)->first();
        return view('Admin.comment.reply',compact(['comment','reply']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post,Comment $comment)
    {
     $comment->delete();
     alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
     return back();

    }
    public function changeStatus(Request $request)

    {

        $comment = Comment::find($request->comment_id);
        $comment->approved = $request->status;
        $comment->save();
        return response()->json(['success'=>'تغییرات با موفقیت ذخیره شد.']);

    }
}
