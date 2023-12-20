<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeleteProductController extends Controller
{
    function deletePage(Request $request)
    {
        $products = DB::table('products')->get();

        return view('delete/delete', compact('products'));
    }

    function deleteProduct(Request $request)
    {
        DB::table('products')
            ->where('id', $request->deleteId)
            ->delete();

        return redirect('/delete')->with('success', 'Product has been deleted successfully');
    }
}
