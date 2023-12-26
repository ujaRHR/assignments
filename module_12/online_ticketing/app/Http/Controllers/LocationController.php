<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function locationPage()
    {
        $locations = Location::all();

        return view("location", compact("locations"));
    }

    public function createLocation(Request $request)
    {
        Location::create([
            "location_name" => $request->locationName,
        ]);

        return redirect("locations")->with("success", "Location Added Successfully!");
    }

    public function updateLocation(Request $request, $id)
    {
        Location::find($id)->update([
            "location_name" => $request->input('locationName'),
        ]);
    }

    public function deleteLocation(Request $request, $id)
    {
        Location::find($id)->delete();
    }
}
