<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        // Today Revenue
        $today      = Carbon::now()->format("Y-m-d");
        $todaySales = DB::table("sells")
            ->whereRaw('DATE(created_at) = ?', [$today])
            ->sum('total_price');

        // Yesterday Revenue
        $yesterday      = Carbon::yesterday()->format("Y-m-d");
        $yesterdaySales = DB::table("sells")
            ->whereRaw('DATE(created_at) = ?', [$yesterday])
            ->sum('total_price');

        // This Month Revenue
        $currentMonthStart = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentMonthEnd   = Carbon::now()->endOfMonth()->format('Y-m-d');

        $thisMonthSales = DB::table('sells')
            ->where('created_at', '>=', $currentMonthStart)
            ->where('created_at', '<=', $currentMonthEnd)
            ->sum('total_price');

        // Last Month Revenue
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $lastMonthEnd   = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');

        $lastMonthSales = DB::table('sells')
            ->where('created_at', '>=', $lastMonthStart)
            ->where('created_at', '<=', $lastMonthEnd)
            ->sum('total_price');


        return view("dashboard", compact("todaySales", "yesterdaySales","thisMonthSales","lastMonthSales"));
    }


}