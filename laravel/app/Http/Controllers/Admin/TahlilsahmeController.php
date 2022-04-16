<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tahlilsahme;
use App\Models\Saham;
use Illuminate\Http\Request;

class TahlilsahmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

         $this->middleware('permission:saham-tahlil', ['only' => ['index','create','store','edit','update','destroy']]);
    }
    public function index(Saham $saham)
    {
        $tahlilsahme = $saham->tahlilsahmes()->latest()->paginate(25);

        return view('Admin.tahlilsahme.index', compact('tahlilsahme', 'saham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Saham $saham)
    {
        return view('Admin.tahlilsahme.create', compact('saham'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Saham $saham)
    {
        $request->merge(['active' => $request->has('active')]);
        $request->merge(['comment' => $request->has('comment')]);
        $request->merge(['user_id' => auth()->user()->id]);
        $tahlilsahm = $saham->tahlilsahmes()->create(
            [
                'name' => $request->name,
                'user_id' => $request->user_id,
                'active' => $request->active,
                'comment' => $request->comment,
                'content' => $request->content,
                'video' => $request->video,
                'type' => $request->type,
                'title' => $request->title,
                'description'=>$request->description,
            ]
        );
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $tahlilsahm->images()->create([
                    'name' => $value['names'],
                    'pic' => $value['pic'],
                ]);
            }
        }

        alert()->success('اطلاعات با موفقیت ثبت شد', 'پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tahlilsahme  $tahlilsahme
     * @return \Illuminate\Http\Response
     */
    public function show(Tahlilsahme $tahlilsahme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tahlilsahme  $tahlilsahme
     * @return \Illuminate\Http\Response
     */
    public function edit(Saham $saham, Tahlilsahme $tahlilsahme)
    {
        $images = $tahlilsahme->images()->get();
        return view('Admin.tahlilsahme.edit', compact('tahlilsahme', 'saham', 'images'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tahlilsahme  $tahlilsahme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saham $saham, Tahlilsahme $tahlilsahme)
    {
        $request->merge(['active' => $request->has('active')]);
        $request->merge(['comment' => $request->has('comment')]);
        $request->merge(['user_id' => auth()->user()->id]);
        $tahlilsahme->update([
            'name' => $request->name,
            'active' => $request->active,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'content' => $request->content,
            'video' => $request->video,
            'type' => $request->type,
            'title' => $request->title,
            'description'=>$request->description,
        ]);
        $tahlilsahme->images()->delete();
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $tahlilsahme->images()->create([
                    'name' => $value['names'],
                    'pic' => $value['pic'],
                ]);
            }
        }
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.saham.tahlilsahme.index', $saham));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tahlilsahme  $tahlilsahme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saham $saham, Tahlilsahme $tahlilsahme)
    {
        $tahlilsahme->delete();
        alert()->success('حذف با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return back();
    }
}
