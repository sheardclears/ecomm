<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\product;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        $data = product::paginate(50);
        return view('admin.product.product', compact('data'));
    }

    public function cat()
    {
        $category = Category::all();
        return view('admin.product.product', compact('category'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.addproduct', compact('category'));
    }

    /*request input data*/
    public function insert(Request $request)
    {
        $data = product::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('productimage/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('product')->with('success', 'Data is successfully added.');
    }

    public function show($id)
    {
        $data = product::find($id);
        return view('admin.product.editproduct', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = product::find($id);
        if ($request->hasFile('image')) {
            $path = 'productimage/' . $data->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $request->file('image')->move('productimage/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
        }
        $data->update($request->all());
        return redirect()->route('product')->with('success', 'Data is successfully updated.');
    }

    public function delete($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->route('product')->with('success', 'Data is successfully deleted.');
    }

    // public function pdf()
    // {
    //     $data = product::all();
    //     view()->share('data', $data);
    //     $pdf = PDF::loadview('productpdf');
    //     return $pdf->download('productdata.pdf');
    // }

    // public function excel()
    // {
    //     return Excel::download(new ProductExport, 'product.xlsx');
    // }
}
