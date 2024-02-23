<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured = product::where('trending', '1')->get();
        $popular = Category::where('popular', '1')->get();
        return view('slider.slider', compact('featured', 'popular'));
    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('category', compact('category'));
    }
    public function viewcate($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $product = product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('cateproduct', compact('category', 'product'));
        } else {
            return redirect('/');
        }
    }

    public function viewprod($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {
            if (product::where('slug', $prod_slug)->exists()) {
                $products = product::where('slug', $prod_slug)->first();
                return view('viewproduct', compact('products'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
