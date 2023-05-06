<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $get_products = Storage::get('product.json');
        $data['products'] = Product::limit(12)->get();
        $get_feature = Storage::get('featured.json');
        $data['featured_products'] = Product::latest()->limit(4)->get();
        return view('home', $data);
    }

    public function about()
    {
        $data['title'] = "About Us";
        return view('about', $data);
    }

    public function contact()
    {
        $data['title'] = "Contact Us";
        return view('contact', $data);
    }

    public function products()
    {
        $data['title'] = "All Products";
        $get_products = Storage::get('product.json');
        $products = Product::with('img')->cursorPaginate(10);
        $data['products'] = $products;
        return view('products', $data);
    }

    public function carts()
    {
        $data['title'] = "Carts";
        return view('carts', $data);
    }

    public function product($id)
    {
        $data['random_products'] = Product::with('img')->inRandomOrder()->limit(4)->get();
        $data['product'] = $product = Product::where('id', $id)->with(['img'])->first();
        $images = [];
        foreach ($product->images as $key => $value) {
            # code...
            $image = File::find($value);
            array_push($images, $image);
        }
        if (!$product) {
            Session::flash('error', "No record found");
            return redirect()->route('admin.products');
        }
        $data['images'] = $images;
        $data['title'] = $product->name;
        return view('product', $data);
    }
}