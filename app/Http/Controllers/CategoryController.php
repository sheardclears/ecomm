<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::paginate(20);
        return view('admin.category.category', compact('data'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    /*request input data*/
    public function insert(Request $request)
    {
        $data = Category::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('categoryimage/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('categories')->with('success', 'Data is successfully added.');
    }

    public function show($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = Category::find($id);
        $data->update($request->all());
        $data->save();
        return redirect()->route('categories')->with('success', 'Data is successfully updated.');
    }

    public function delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->route('categories')->with('success', 'Data is successfully deleted.');
    }
}
