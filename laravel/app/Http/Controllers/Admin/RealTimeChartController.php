<?php

namespace App\Http\Controllers;

use App\Models\RealTimeChart;
use App\Http\Requests\StoreRealTimeChartRequest;
use App\Http\Requests\UpdateRealTimeChartRequest;

class RealTimeChartController extends Controller
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
     * @param  \App\Http\Requests\StoreRealTimeChartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRealTimeChartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealTimeChart  $realTimeChart
     * @return \Illuminate\Http\Response
     */
    public function show(RealTimeChart $realTimeChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealTimeChart  $realTimeChart
     * @return \Illuminate\Http\Response
     */
    public function edit(RealTimeChart $realTimeChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRealTimeChartRequest  $request
     * @param  \App\Models\RealTimeChart  $realTimeChart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRealTimeChartRequest $request, RealTimeChart $realTimeChart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealTimeChart  $realTimeChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealTimeChart $realTimeChart)
    {
        //
    }
}
