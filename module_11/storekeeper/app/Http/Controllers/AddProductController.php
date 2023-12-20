<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AddProductController extends Controller
{
    function createPage(Request $request)
    {
        return view("create/create");
    }

    function addProducts(Request $request)
    {
        DB::table('products')
            ->insert([
                'name' => $request->productName,
                'slug' => $request->productSlug,
                'price' => $request->productPrice,
                'quantity' => $request->productQuantity,
            ]);
        return redirect('add')->with('success', 'Product added successfully.');
    }
}
