<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Route;
use App\Models\Location;
use App\Models\Bus;

class TripsController extends Controller
{
    public function tripsPage(Request $request)
    {
        $trips     = Trip::all();
        $routes    = Route::all();
        $locations = Location::all();
        $buses     = Bus::all();

        return view("trips", compact("trips", "routes", "locations", "buses"));
    }

    public function createTrip(Request $request)
    {
        Trip::create([
            "route_id"       => $request->input('route'),
            "departure_date" => $request->input("departureDate"),
            "assigned_bus"   => $request->input("assignedBus"),
        ]);

        return redirect('trips')->with("success", "Trip Created Successfully!");
    }

    public function deleteTrip(Request $request, $id)
    {

        Trip::find($id)->delete();

    }


}
