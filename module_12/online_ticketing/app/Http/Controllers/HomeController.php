<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Location;
use App\Models\Trip;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function homepage(Request $request)
    {

        $routes    = Route::all();
        $locations = Location::all();
        $trips     = Trip::all();

        return view("userzone/homepage", compact("routes", "locations", "trips"));
    }

    public function searchTicket(Request $request)
    {
        $selectedDate  = $request->input("departureDate");
        $selectedRoute = $request->input("routeSelection");

        $dateExist  = Trip::whereDate('departure_date', $selectedDate)->exists();
        $routeExist = Trip::where('route_id', $selectedRoute)->exists();

        if ($routeExist && $dateExist) {
            return redirect('bus-view');
        }
    }

    public function busView(Request $request)
    {
        view("userzone/busView");
    }
}
