<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function trail()
    {
        return $this->belongsTo('App\Trail');
    }
}
