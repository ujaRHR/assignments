<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class Route extends Model
{
    use HasFactory;
    protected $fillable = ['from_location_id', 'to_location_id', 'ticket_price'];

    public function locations(){
        return $this->belongsToMany(Location::class)->withPivot('order');
    }

    public function trips(){
        return $this->hasMany(Trip::class);
    }
}