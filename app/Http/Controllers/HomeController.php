<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Home";
        $get_products = Storage::get('product.json');
        $data['products'] = $products = json_decode($get_products, true);
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
        $data['products'] = $products = json_decode($get_products, true);
        return view('products', $data);
    }

    public function carts()
    {
        $data['title'] = "Carts";
        return view('carts', $data);
    }

    public function product($id)
    {
        $get_products = Storage::get('product.json');
        $data['products'] = $products = json_decode($get_products, true);
        $product = [];
        foreach ($products as $key => $value) {
            # code...
            if ($id == $value['id']) {
                array_push($product, $value);
            }
        }
        $data['product'] = $product;
        $data['title'] = $product[0]['name'] ?? "Product";
        return view('product', $data);
    }
}