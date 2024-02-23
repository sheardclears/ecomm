<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = cart::where('user_id', Auth::id())->get();
        return view('cart.index', compact('carts'));
    }

    public function addcart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {
            $prod_check = product::where('id', $product_id)->first();

            if ($prod_check) {
                if (cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . " Already Added to Cart"]);
                } else {
                    $itemcart = new cart();
                    $itemcart->prod_id = $product_id;
                    $itemcart->user_id = Auth::id();
                    $itemcart->prod_qty = $product_qty;
                    $itemcart->save();
                    return response()->json(['status' => $prod_check->name . " Added to Cart"]);
                }
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function delcart(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $itemcart = cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $itemcart->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function upcart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated"]);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }
}
