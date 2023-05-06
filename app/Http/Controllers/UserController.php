<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = "Account";
        if ($_POST) {
            $rules = array(
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'max:255', 'unique:users,email,' . Auth::user()->id],
                'phone' => ['nullable', 'string', 'max:255']
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                // dd($validator->errors());
                Session::flash('warning', __('All fields are required'));
                return back()->withErrors($validator)->withInput();
            }

            $update_user = User::where('id', Auth::user()->id)->update([
                'name' => $request->name ?? Auth::user()->name,
                'phone' => $request->phone ?? Auth::user()->name,
                'email' => $request->email ?? Auth::user()->email,
            ]);

            if (!$update_user) {
                # code...
                Session::flash('error', "An error occur when update profile, try again");
                return back();
            }


            Session::flash('success', "Profile updated successfully");
            return redirect()->route('account');
        }
        return view('account', $data);
    }

    public function my_carts(Request $request)
    {
        $data['title'] = "My Carts";
        return view('my-carts', $data);
    }

    public function orders()
    {
        $data['mode'] = "ORR";
        $data['title'] = "Order History";
        $data['sn'] = 1;
        $data['orders'] = Order::where('user_id', Auth::user()->id)->orderBy('id', "DESC")->get();
        return view('order-history', $data);
    }

    public function order($id)
    {
        $data['mode'] = "ORD";
        $data['order'] = $order = Order::where(['user_id' => Auth::user()->id, 'unique_id' => $id])->first();
        if (!$order) {
            # code...
            Session::flash('warning', 'No record found');
            return redirect()->route('orders');
        }
        $data['transaction'] = Transaction::where('order_id', $order->id)->first();
        $data['order_products'] = OrderDetail::where('order_id', $order->id)->with('product')->get();
        $data['title'] = "Order Details";
        $data['sn'] = 1;
        return view('order-history', $data);
    }

    public function password(Request $request)
    {
        $data['title'] = "Change Password";

        if ($_POST) {
            $rules = array(
                'current_password'     => 'required',
                'new_password'  => ['required', 'min:8', 'same:confirm_new_password', 'max:16', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&+-]/'],
                'confirm_new_password' => 'required'
            );

            $fieldNames = array(
                'current_password'     => 'Current Password',
                'new_password'  => 'New Password',
                'confirm_new_password' => 'Confirm New Password'
            );
            // dd($request->all());
            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);
            if ($validator->fails()) {
                Session::flash(__('warning'), __('Password must 8 character long, maximum of 16 character, One English uppercase characters (A – Z), One English lowercase characters (a – z), One Base 10 digits (0 – 9) and One Non-alphanumeric (For example: !, $, #, or %)'));
                return back()->withErrors($validator);
            }

            $current_password = Auth::user()->password;
            if (!Hash::check($request->current_password, $current_password)) {
                Session::flash(__('warning'), __('Password Wrong'));
                return back()->withErrors(['current_password' => __('Please enter correct current password')]);
            }

            $obj_user = User::find(Auth::user()->id);
            $obj_user->password = Hash::make($request->new_password);
            $obj_user->save();
            Session::flash(__('success'), __('Password changed successfully'));
            return \back();
        }
        return view('password', $data);
    }

    public function login(Request $request)
    {
        try {
            //code...
            $rules = array(
                'email' => ['required', 'max:255', 'email'],
                'password' => ['string', 'max:255'],
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                Session::flash('warning', __('All fields are required'));
                return back()->withErrors($validator)->withInput();
            }

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                // Authentication passed...
                Session::flash('error', "Incorrect credentials");
                return back();
            }
            // $user = User::create([
            //     "name" => "Dara",
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            // ]);

            Session::flash('success', "Login successfully");
            return redirect()->intended('account');
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            Session::flash('error', $th->getMessage());
            return back();
            //throw $th;
        }

        // $data['title'] = "Account";
        // return view('account', $data);
    }

    public function save_order(Request $request)
    {
        try {
            //code...
            if ($_POST) {
                # code...
                // return $request->all();
                $products = $request->allProducts;
                $order = Order::create([
                    "user_id" => Auth::user()->id,
                    "amount" => $request->amount,
                    "unique_id" => Str::random(10),
                ]);
                $transaction = Transaction::create([
                    "user_id" => Auth::user()->id,
                    "order_id" => $order->id,
                    "amount" => $request->amount,
                    "reference" => $request->reference,
                    "status" => $request->status,
                    "trxref" => $request->trxref,
                ]);

                $order->transaction_id = $transaction->id;
                $order->save();

                foreach ($products as $key => $value) {
                    # code...
                    $product = Product::find($value['id']);
                    $product->quantity = $product->quantity - $value['quantity'];
                    $product->save();

                    $data = [
                        "order_id" => $order->id,
                        "product_id" => $value['id'],
                        "amount" => $value['price'],
                        "quantity" => $value['quantity'],
                        "size" => $value['size'],
                    ];
                    OrderDetail::create($data);
                }
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flash('success', "Logout successfully");
        return back();
    }
}