<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trail extends Model
{
    public function points(): HasMany
    {
        return $this->hasMany('App\Point');
    }
}
