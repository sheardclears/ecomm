<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $customer = User::where('role_as', '0')->paginate(50);
        return view('admin.user.index', compact('customer'));
    }


    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/users')->with('success', 'Data is successfully deleted.');
    }
}
