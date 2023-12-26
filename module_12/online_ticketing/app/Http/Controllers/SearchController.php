<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searchBus(Request $request)
    {

        $search = $request->input("search");
    }
}
