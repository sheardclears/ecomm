<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserorderController extends Controller
{
    public function index()
    {
        $order = Checkout::where('user_id', Auth::id())->get();
        return view('history.user', compact('order'));
    }
}
