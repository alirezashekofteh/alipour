<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::latest()->paginate(30);
        return view('discount::admin.all' , compact('discounts'));
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
        $validated = $request->validate([
            'code' => 'required|unique:discounts,code',
            'percent' => 'required|integer|between:1,99',
            'users' => 'nullable|array|exists:users,id',
            'terms' => 'nullable|array|exists:terms,id',
            'subscriptions' => 'nullable|array|exists:subscriptions,id',
            'expired_at' => 'required'
         ]);

         $discount = Discount::create($validated);

         $discount->users()->attach($validated['users']);
         $discount->terms()->attach($validated['terms']);
         $discount->subscriptions()->attach($validated['subscriptions']);

         return redirect(route('admin.discount.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'code' => ['required' , Rule::unique('discounts' , 'code')->ignore($discount->id)],
            'percent' => 'required|integer|between:1,100',
            'users' => 'nullable|array|exists:users,id',
            'terms' => 'nullable|array|exists:terms,id',
            'subscriptions' => 'nullable|array|exists:subscriptions,id',
            'expired_at' => 'required'
        ]);

        $discount->update($validated);

        isset($validated['users'])
            ? $discount->users()->sync($validated['users'])
            : $discount->users()->detach();

        isset($validated['terms'])
            ? $discount->terms()->sync($validated['terms'])
            : $discount->terms()->detach();

        isset($validated['subscriptions'])
            ? $discount->subscriptions()->sync($validated['subscriptions'])
            : $discount->subscriptions()->detach();


        return redirect(route('admin.discount.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
