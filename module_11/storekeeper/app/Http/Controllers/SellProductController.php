<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SellProductController extends Controller
{
    function sellPage(Request $request)
    {
        $products = DB::table("products")->get();

        return view("sell/sell", compact("products"));
    }

    function sellProduct(Request $request)
    {
        $productName       = $request->input("productName");
        $product           = DB::table("products")->where("name", $productName)->first();
        $prviousQuantity   = $product->quantity;
        $requestedQuantity = $request->input("productQuantity");

        if ($product) {
            if ($prviousQuantity > $requestedQuantity) {
                DB::table("products")->where("name", $productName)->update([
                    "quantity" => $prviousQuantity - $request->productQuantity
                ]);

                DB::table("sells")
                    ->insert([
                        "product_id" => $product->id,
                        "price" => $product->price,
                        "quantity" => $request->input('productQuantity'),
                        "total_price" => $product->price * $request->input('productQuantity')
                    ]);
                $route = route('transactions');
                return redirect("/sell")->with("success", "Product Sold Successfully. Check Log <a href='$route'>Here</a>");
            } else{
                return redirect()->back()->with("error", "Insufficient quantity ($requestedQuantity) for sale. Available: $prviousQuantity");
            }
        } else {
            return redirect()->back()->with("error", "Product not found . $productName");
        }




    }
}
