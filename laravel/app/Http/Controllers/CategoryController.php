<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use DB;
class CategoryController extends Controller
{
    public function list($category){
   $cat = Category::where('id', $category)
           ->orWhere('slug', $category)
           ->first();

  //  $posts=$category->post()->paginate(20);
    $categories = $cat->descendants()->add($cat)->pluck('id');

    // $posts=CategoryPost::WhereIn('category_id',$categories)
    //     ->Join('posts', 'category_post.post_id', '=', 'posts.id')
    //     ->select('posts.*')->get();
    // ;
    $posts=Post::whereHas('category' , function ($query) use ($categories) {
        return $query->whereIn('id' , $categories);
    })->paginate(10);
     dd($cag);
    // $posts = DB::table('category_post AS cp')
    //     ->join('posts', 'cp.post_id', '=', 'posts.id')
    //     ->select('posts.*')
    //     ->whereIn('cp.category_id', $categories)
    //     ->paginate(3);

   // $categories = Category::where('slug', $category)->with('recursiveChildren')->get();
    // $posts = collect([]);
    // foreach($categories as $category) {
    //     $category_posts = $category->post;

    //     foreach($category_posts as $post) {
    //        if(!$posts->contains($post)) $posts->add($post);
    //     }

    // }
        return view('Front.blog',compact(['posts','cat']));

    }
}
