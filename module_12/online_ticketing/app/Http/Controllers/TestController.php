<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Location;

class TestController extends Controller
{
  public function test(Request $request)
  {
    $data = Trip::find(5);


    return $data;
  }
}
