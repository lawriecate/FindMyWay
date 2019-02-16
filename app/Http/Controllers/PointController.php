<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use App\Trail;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trail = Trail::with('points')->find($request->input('trail_id'));
        $point = new Point(
            [
                'trail_id' => $trail->id,
                'long' => $request->input('long') ?? 0,
                'lat' => $request->input('lat') ?? 0,
                'angle' => $request->input('angle') ?? 0,
                'speed' => $request->input('speed') ?? 0,
                'magnetometer_x' => $request->input('magnetometer_x') ?? 0,
                'magnetometer_y' => $request->input('magnetometer_y') ?? 0,
                'magnetometer_z' => $request->input('magnetometer_z') ?? 0,
                'accelerometer_x' => $request->input('accelerometer_x') ?? 0,
                'accelerometer_y' => $request->input('accelerometer_y') ?? 0,
                'accelerometer_z' => $request->input('accelerometer_z') ?? 0,
                'step_count' => $request->input('step_count') ?? 0,
            ]);
        $point->save();
        $trail->refresh();
        return response()->json(['success' => 'success', 'trail'=> $trail], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function addPoint(Request $request, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
