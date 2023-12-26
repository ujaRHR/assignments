<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['bus_name', 'total_seat', 'available_seat'];

    public function trips(){
        return $this->belongsToMany(Trip::class);
    }
}
