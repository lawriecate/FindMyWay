<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['trail_id', 'long', 'lat', 'angle', 'speed',
        'magnetometer_x', 'magnetometer_y', 'magnetometer_z',
        'accelerometer_x', 'accelerometer_y', 'accelerometer_z',
        'step_count'];

    public function trail()
    {
        return $this->belongsTo('App\Trail');
    }
}
