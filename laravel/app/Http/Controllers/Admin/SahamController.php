<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Saham;
use Illuminate\Http\Request;

class SahamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

           $this->middleware('permission:saham-list', ['only' => ['index']]);
           $this->middleware('permission:saham-add', ['only' => ['create','store']]);
           $this->middleware('permission:saham-edit', ['only' => ['edit','update']]);
           $this->middleware('permission:saham-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $saham = Saham::query();
        if ($keyword = request('search')) {
            // $post->where('name', 'LIKE', "%{$keyword}%")->orWhere('content', 'LIKE', "%{$keyword}%")->orWhere('fullcontent', 'LIKE', "%{$keyword}%");
           $saham= $saham->where('name', 'LIKE', "%{$keyword}%");
        }
        $saham = $saham->latest()->paginate(25);
        return view('Admin.saham.index',compact('saham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.saham.create');
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
        $saham=Saham::create($request->all());
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $saham->metas()->create([
                    'name' => $value['names'],
                    'value' => $value['value'],
                ]);
            }
        }
        alert()->success('اطلاعات با موفقیت ثبت شد','پیغام سیستم')->persistent("تایید");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saham  $saham
     * @return \Illuminate\Http\Response
     */
    public function show(Saham $saham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saham  $saham
     * @return \Illuminate\Http\Response
     */
    public function edit(Saham $saham)
    {
        $metas = $saham->metas()->get();
        return view('Admin.saham.edit', compact(['saham','metas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saham  $saham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saham $saham)
    {
        $request->merge(['active' => $request->has('active')]);
        $saham->update($request->all());
        $saham->metas()->delete();
        if ($request->groupa) {
            foreach ($request->groupa as $key => $value) {
                $saham->metas()->create([
                    'name' => $value['names'],
                    'value' => $value['value'],
                ]);
            }
        }
        alert()->success('ویرایش  با موفقیت انجام شد', 'پیغام سیستم')->persistent('تایید');
        return redirect(route('admin.saham.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saham  $saham
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saham $saham)
    {
    $saham->delete();
     alert()->success('حذف با موفقیت انجام شد','پیغام سیستم')->persistent('تایید');
     return back();
    }
}
