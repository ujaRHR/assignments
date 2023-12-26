<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ["route_id", "departure_date", "assigned_bus"];
    
    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function buses(){
        return $this->belongsToMany(Bus::class);
    }
}
