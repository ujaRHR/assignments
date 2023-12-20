<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TransactionsController extends Controller
{
    function transactionPage(Request $request)
    {
        $transactions = DB::table("sells")
            ->selectRaw('name as product_name, sells.price as product_price, sells.quantity as quantity, total_price, sells.updated_at as date')
            ->join("products", "sells.product_id", "=", "products.id")
            ->get();

        return view("transactions/history", compact('transactions'));
    }

    function transactionsHistory(Request $request)
    {

    }
}
