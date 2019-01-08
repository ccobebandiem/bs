<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Bus;

class BusStop extends Model
{

    protected $table = 'bus_stop';

    protected $fillable = [
        'name', 'lat', 'lng'
    ];

    public function buses()
    {
        return $this->belongsToMany(Bus::class);
    }

}
