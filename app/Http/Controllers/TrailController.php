<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use App\Trail;
use Illuminate\Support\Facades\Log;

class TrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trail = Trail::with('points')->get();
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
        Log::info(print_r($request->all(), TRUE));
        $points = $request->input('points');
        if ($points === null || \count($points) === 0) {
            return [];
        }

        $trail = new Trail();
        $trail->title = $request->input('title', 'New Trail');

        $trail->save();
        $trail->refresh();
        foreach ($points as $point):
            $point = new Point(
                [
                    'trail_id' => $trail->id,
                    'long' => $point['long'] ?? 0,
                    'lat' => $point['lat'] ?? 0,
                    'angle' => $point['angle'] ?? 0,
                    'speed' => $point['speed'] ?? 0,
                    'magnetometer_x' => $point['magnetometer_x'] ?? 0,
                    'magnetometer_y' => $point['magnetometer_y'] ?? 0,
                    'magnetometer_z' => $point['magnetometer_z'] ?? 0,
                    'accelerometer_x' => $point['accelerometer_x'] ?? 0,
                    'accelerometer_y' => $point['accelerometer_y'] ?? 0,
                    'accelerometer_z' => $point['accelerometer_z'] ?? 0,
                    'step_count' => $point['step_count'] ?? 0,
                ]);
            $point->save();
        endforeach;
        $trail = Trail::with('points')->find($trail->id);
        return response()->json(['success' => 'success', 'trail' => $trail], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trail = Trail::with('points')->find($id);
        return response()->json($trail);
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

    public function follow($id)
    {
        $angle = (int)(((new \DateTime())->format('s') / 60) * 360);
        return response()->json(
            [
                'degree' => $angle,
                'text' => 'daijobu'
            ]
        );
    }
}
