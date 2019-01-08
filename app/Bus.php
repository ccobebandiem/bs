<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{

    protected $table = 'bus_stop';

    protected $fillable = [
        'name', 'description'
    ];

    public function busStops()
    {
        return $this->belongsToMany(BusStop::class);
    }

}
