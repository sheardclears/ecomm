<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\task;
use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{

    public function barchart()
    {
        $users = User::where('role_as', '0')->count();
        $products = product::all()->count();
        $tasks = task::all()->count();
        $categories = category::all()->count();
        $pengguna = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $bulan = User::select(DB::raw("Month(created_at) as bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('bulan');

        $bardata = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($bulan as $index => $bln) {
            $bardata[$bln - 1] = $pengguna[$index];
        }

        $taskes = Task::orderBy('status')->get();

        return view('dashboard.index', compact('bardata', 'users', 'products', 'tasks', 'taskes', 'categories'));
    }

    public function piechart()
    {
        $produk = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $bulan = User::select(DB::raw("Month(created_at) as bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('bulan');

        $bardata = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($bulan as $index => $bln) {
            $bardata[$bln - 1] = $produk[$index];
        }

        $tasks = Task::orderBy('status')->get();

        return view('dashboard.index', compact('bardata', 'tasks'));
    }
}
