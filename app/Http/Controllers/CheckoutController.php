<?php

namespace App\Http\Controllers;

use id;
use App\Models\cart;
use App\Models\User;
use App\Models\Order;
use App\Models\product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartco = cart::where('user_id', Auth::id())->get();
        foreach ($old_cartco as $item) {
            if (!product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $remove = cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $remove->delete();
            }
        }
        $cartco = cart::where('user_id', Auth::id())->get();
        return view('checkout.index', compact('cartco'));
    }

    public function order(Request $request)
    {
        $checkout = new Checkout();
        $checkout->user_id = Auth::id();
        $checkout->Nama = $request->input('Nama');
        $checkout->Notelp = $request->input('Notelp');
        $checkout->Alamat = $request->input('Alamat');
        $checkout->Kecamatan = $request->input('Kecamatan');
        $checkout->Kabupaten = $request->input('Kabupaten');
        $checkout->Provinsi = $request->input('Provinsi');
        $checkout->Kodepos = $request->input('Kodepos');
        $checkout->Keterangan = $request->input('Keterangan');

        //total
        $total = 0;
        $cartitems_total = cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $key => $prod) {
            $total += $prod->products->sellprice * $prod->prod_qty;
        }
        $checkout->total_price = $total;

        $checkout->notracking = 'tracker' . rand(0001, 9999);
        $checkout->save();

        $checkout->id;

        $cartitems = cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $ci) {
            Order::create([
                'order_id' => $checkout->id,
                'prod_id' => $ci->prod_id,
                'qty' => $ci->prod_qty,
                'price' => $ci->products->sellprice,
            ]);
            $prod = product::where('id', $ci->prod_id)->first();
            $prod->qty = $prod->qty - $ci->prod_qty;
            $prod->update();
        }

        // if (Auth::user()->Alamat == NULL) {
        //     $user = User::where('id', Auth::id())->first();
        //     $user->name = $request->input('Nama');
        //     $user->Notelp = $request->input('Notelp');
        //     $user->Alamat = $request->input('Alamat');
        //     $user->Kecamatan = $request->input('Kecamatan');
        //     $user->Kabupaten = $request->input('Kabupaten');
        //     $user->Provinsi = $request->input('Provinsi');
        //     $user->Kodepos = $request->input('Kodepos');
        //     $user->Keterangan = $request->input('Keterangan');
        //     $user->update();
        // }
        $cartitems = cart::where('user_id', Auth::id())->get();
        cart::destroy($cartitems);
        return redirect('/vieworder')->with('status', 'Order placed successfully');
    }
}
