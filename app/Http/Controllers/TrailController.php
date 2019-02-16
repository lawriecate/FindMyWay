<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use App\Trail;

class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trail = Trail::all();
        return response()->json($trail);
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
        $trail = new Trail();
        $trail->title = $request->input('title', 'New Trail');
        $points = $request->input('points');
        foreach ($points as $point):
            $point = new Point(
                [   'trail_id' => $trail->id,
                    'long' => $point->long,
                    'lat' =>$point->lat,
                    'angle' => $point->angle,
                    'speed' => $point->speed,
                    'magnetometer_x' => $point->magnetometer_x,
                    'magnetometer_y' => $point->magnetometer_y,
                    'magnetometer_z' => $point->magnetometer_z,
                    'accelerometer_x' => $point->accelerometer_x,
                    'accelerometer_y' => $point->accelerometer_y,
                    'accelerometer_z' => $point->accelerometer_z,
                    'step_count' => $point->step_count
                ]);
            $point->save();
        endforeach;
        $trail->save();
        return response()->json($trail);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
