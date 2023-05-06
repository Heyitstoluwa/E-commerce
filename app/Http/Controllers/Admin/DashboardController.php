<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserWelcomeEmail;
use App\Models\Currency;
use App\Models\FAQ;
use App\Models\Material;
use App\Models\MaterialHistory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\File;
use App\Models\MaterialType;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class DashboardController extends Controller
{

    public function login(Request $request)
    {

        try {
            //code...
            if ($_POST) {
                $rules = array(
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => ['required', 'string', 'max:255'],
                );

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    Session::flash('warning', __('All fields are required'));
                    return back()->withErrors($validator)->withInput();
                }
            }

            $data['title'] = "Admin Login";
            return View('admin.auth.login', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function index(Request $request)
    {
        # code...
        try {
            //code...
            $data['title'] = "Admin Dashboard";
            $data['user_count'] = User::where('role', 'user')->count();
            $data['product_count'] = Product::all()->count();
            $data['trans'] = $trans = Transaction::all();
            $data['orders'] = $orders = Order::all();
            $data['trans_count'] = $trans->count();
            $data['trans_sum'] = $trans->sum('amount');
            $data['orders_count'] = $orders->count();
            $data['orders_sum'] = $orders->sum('amount');
            return View('admin.dashboard.index', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function profile(Request $request)
    {
        # code...
        try {
            //code...

            if ($_POST) {
                $rules = array(
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'max:255', 'unique:users,email,' . Auth::user()->id],
                    // 'gender' => ['string', 'max:255'],
                    'phone' => ['nullable', 'string', 'max:255'],
                    // 'avatar' => ['nullable', 'max:5000']
                );

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    // dd($validator->errors());
                    Session::flash('warning', __('All fields are required'));
                    return back()->withErrors($validator)->withInput();
                }

                // dd($request->all());
                // if ($request->hasFile('avatar')) {
                //     $profile_pics = $request->file('avatar');
                //     $profile_pics_name = 'MaterialCover' . time() . '.' . $profile_pics->getClientOriginalExtension();
                //     Storage::disk('profile_pics')->put($profile_pics_name, file_get_contents($profile_pics));
                //     $save_cover = File::create([
                //         'name' => $profile_pics_name,
                //         'url' => 'storage/avatars/' . $profile_pics_name
                //     ]);
                // }

                $update_user = User::where('id', Auth::user()->id)->update([
                    'name' => $request->name ?? Auth::user()->name,
                    'email' => $request->email ?? Auth::user()->email,
                    'phone' => $request->phone ?? Auth::user()->phone,
                ]);

                if (!$update_user) {
                    # code...
                    Session::flash('error', "An error occur when update profile, try again");
                    return back();
                }


                Session::flash('success', "Profile updated successfully");
                return redirect()->route('admin.settings');
            }

            return redirect()->route('admin.settings');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function settings(Request $request)
    {

        # code...
        try {
            //code...
            $data['sn'] = 1;
            $data['title'] = "General Settings";
            return View('admin.settings.index', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function orders()
    {

        # code...
        try {
            //code...
            $data['sn'] = 1;
            $data['title'] = "Orders";
            $data['orders'] = Order::with('user')->get();
            return View('admin.product.orders', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function order($id)
    {
        # code...
        try {
            //code...
            $data['sn'] = 1;
            $data['title'] = "Orders";
            $data['order'] = $order = Order::where(['unique_id' => $id])->first();
            if (!$order) {
                # code...
                Session::flash('warning', 'No record found');
                return redirect()->route('admin.orders');
            }
            $data['transaction'] = Transaction::where('order_id', $order->id)->first();
            $data['user'] = User::where('id', $order->user_id)->first();
            $data['order_products'] = OrderDetail::where('order_id', $order->id)->with('product')->get();
            return View('admin.modals.order', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }

    public function transactions()
    {

        # code...
        try {
            //code...
            $data['sn'] = 1;
            $data['title'] = "Transactions";
            $data['transactions'] = Transaction::with(['order', 'user'])->get();
            return View('admin.product.transactions', $data);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            //throw $th;
        }
    }


    public function password(Request $request)
    {
        # code...
        try {

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
                    return back()->withErrors($validator)->withInput(['tabName' => 'general']);;
                }

                $current_password = Auth::user()->password;
                if (!Hash::check($request->current_password, $current_password)) {
                    Session::flash(__('warning'), __('Password Wrong'));
                    return back()->withErrors(['current_password' => __('Please enter correct current password')])->withInput(['tabName' => 'general']);;
                }

                $obj_user = User::find(Auth::user()->id);
                $obj_user->password = Hash::make($request->new_password);
                $obj_user->save();
                Session::flash(__('success'), __('Password changed successfully'));
                return \back();
            }
            return redirect()->route('admin.settings');
        } catch (\Throwable $th) {
            return $th->getMessage();
            // dd($th->getMessage());
            //throw $th;
        }
    }
}