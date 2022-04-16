<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChannelUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ChannelUser  $channelUser
     * @return \Illuminate\Http\Response
     */
    public function show(ChannelUser $channelUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChannelUser  $channelUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ChannelUser $channelUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChannelUser  $channelUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChannelUser $channelUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChannelUser  $channelUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChannelUser $channeluser)
    {
        $channeluser->delete();
        return back();
    }
}
