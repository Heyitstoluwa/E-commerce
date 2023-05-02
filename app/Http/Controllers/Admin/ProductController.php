<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        # code...
        try {
            //code...
            $data['title'] = "Products";
            $data['sn'] = 1;
            $data['products'] = $p = Product::with('img')->get();
            // dd($p);
            return View('admin.product.index', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function add(Request $request)
    {
        # code...
        try {
            if ($_POST) {
                $rules = array(
                    // 'name' => ['required', 'string', 'max:50', 'name', 'unique:products'],
                    'name' => ['required', 'string', 'max:50'],
                    'amount' => ['required', 'string', 'max:50'],
                    'quantity' => ['required', 'string', 'max:50'],
                    'size' => ['required', 'string', 'max:50'],
                    'details' => ['required', 'max:250'],
                    'image' => ['required', 'mimes:jpeg,png,jpg,svg', 'max:50000'],
                    'images' => ['required', 'max:50000'],
                );

                $messages = [];

                $validator = Validator::make($request->all(), $rules, $messages);

                if ($validator->fails()) {
                    Session::flash('warning', __('All fields are required'));
                    return back()->withErrors($validator)->withInput();
                }

                if ($request->hasFile('image')) {
                    $product_image = $request->file('image');
                    $product_feature_image = 'ProductImages' . time() . '.' . $product_image->getClientOriginalExtension();
                    $destinationPath = public_path('/products_images/');
                    $p_img = Image::make($product_image->path());
                    $p_img->resize(475, 633, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath . '/' . $product_feature_image);
                    $save_product_feature_image = File::create([
                        'name' => $product_feature_image,
                        'url' => 'products/' . $product_feature_image
                    ]);
                }

                $images = [];

                if ($request->hasFile('images')) {
                    foreach ($request->images as $key => $image) {
                        # code...
                        $product_images = $image;
                        $product_image_name = 'ProductImages' . $key . time() . '.' . $product_images->getClientOriginalExtension();
                        $destinationPath_image = public_path('/products_images/');
                        $img = Image::make($product_images->path());
                        $img->resize(475, 633, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath_image . '/' . $product_image_name);
                        $save_product_images = File::create([
                            'name' => $product_image_name,
                            'url' => 'products/' . $product_image_name
                        ]);
                        array_push($images, $save_product_images->id);
                    }
                }

                $size = explode(",", $request->size);

                Product::create([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'quantity' => $request->quantity,
                    'details' => $request->details,
                    'size' => $size,
                    'image' => $save_product_feature_image->id ?? null,
                    'images' => $images,
                ]);

                Session::flash('success', "Product created successfully");
                return redirect()->route('admin.products');
            }

            $data['title'] = "Add Product";
            return View('admin.product.create', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function edit(Request $request, $id)
    {
        # code...
        try {
            //code...
            $data['product'] = $product = Product::where('id', $id)->with('img')->first();
            $data['title'] = $product->name;
            if (!$product) {
                Session::flash('error', "No record found");
                return redirect()->route('admin.products');
            }

            if ($_POST) {
                $rules = array(
                    'name' => ['required', 'max:255', 'unique:products,name,' . $product->id],
                    'amount' => ['required', 'string', 'max:50'],
                    'quantity' => ['required', 'string', 'max:50'],
                    'details' => ['required', 'max:250']
                );

                $messages = [];

                $validator = Validator::make($request->all(), $rules, $messages);

                if ($validator->fails()) {
                    Session::flash('warning', __('All fields are required'));
                    return back()->withErrors($validator)->withInput();
                }

                $size = explode(",", $request->size);

                Product::where('id', $id)->update([
                    'name' => $request->name,
                    'amount' => $request->amount,
                    'quantity' => $request->quantity,
                    'details' => $request->details
                ]);

                Session::flash('success', "Product Updated successfully");
                return redirect()->route('admin.products');
            }
            return View('admin.product.edit', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function view($id)
    {
        # code...
        try {
            //code...
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
            return View('admin.product.view', $data);
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }

    public function delete($id)
    {
        # code...
        try {
            //code...
            $product = Product::where('id', $id)->first();
            if (!$product) {
                Session::flash('error', "No record found");
                return redirect()->route('admin.products');
            }
            $product->delete();
            Session::flash('success', "Product deleted successfully");
            return redirect()->route('admin.products');
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
}
