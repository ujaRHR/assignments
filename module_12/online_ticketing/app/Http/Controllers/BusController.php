<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class BusController extends Controller
{
    public function busPage(Request $request)
    {
        $buses = Bus::all();
        return view("create-bus", compact("buses"));
    }

    public function createBus(Request $request)
    {
        $busName   = $request->input("busName");
        $totalSeat = $request->input("totalSeat");

        Bus::create([
            "bus_name"   => $busName,
            "totat_seat" => $totalSeat,
        ]);

        return redirect("create-bus")->with("success", "$busName Added Successfully as a New Bus!");

    }

    public function deleteBus(Request $request, $id)
    {
        Bus::find($id)->delete();
    }

    public function updateBus(Request $request, $id)
    {
        Bus::find($id)->update([
            "bus_name"       => $request->input('busName'),
            "total_seat"     => $request->input('totalSeat'),
            "available_seat" => $request->input('availableSeat')
        ]);
    }
}