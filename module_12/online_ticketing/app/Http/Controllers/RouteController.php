<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Location;

class RouteController extends Controller
{
    public function routePage()
    {
        $routes    = Route::all();
        $locations = Location::all();

        return view("route", compact("routes", "locations"));
    }

    public function createRoute(Request $request)
    {
        $fromLocation = $request->input('fromLocation');
        $toLocation   = $request->input('toLocation');
        $ticketPrice  = $request->input('ticketPrice');
        if ($fromLocation != $toLocation) {
            Route::create([
                "from_location_id" => $fromLocation,
                "to_location_id"   => $toLocation,
                "ticket_price"     => $ticketPrice
            ]);

            return redirect('routes')->with("success", "New Route Created Successfully!");
        } else {
            return redirect('routes')->with("error", "Departure & Arrival location can not be same!");
        }
    }

    public function deleteRoute(Request $request, $id)
    {
        Route::find($id)->delete();
    }
}
