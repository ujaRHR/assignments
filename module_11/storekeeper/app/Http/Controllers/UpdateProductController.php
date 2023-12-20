<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UpdateProductController extends Controller
{
    function updatePage(Request $request)
    {
        $products = DB::table("products")->get();

        return view("update/update", compact('products'));
    }


    function updateProduct(Request $request)
    {
        DB::table('products')
            ->where('id', $request->editId)
            ->update([
                'name' => $request->editName,
                'slug' => $request->editSlug,
                'price' => $request->editPrice,
                'quantity' => $request->editQuantity,
            ]);

        return redirect('update')->with('success', 'Product Updated Successfully.');
    }

}
