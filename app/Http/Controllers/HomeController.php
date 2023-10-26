<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    function __construct()
    {
        $this->model = new HomeModel();
    }

    public function index()
    {
        /**
         * Fetch slider data
         */
        $data['title'] = "Home";
        $data['sliders'] = DB::table('sliders')
            ->select('title', 'sub_title', 'img')
            ->get();

        $data['products'] = DB::table('product')
            ->select('id', 'name', 'sale_price', 'mrp', 'img')
            ->get();


        return view('frontend.index', $data);
    }


    public function product_details($id = '')
    {
        /**
         * Fetch product data
         */

        $data['product'] = DB::table('product')
            ->select('id', 'name', 'sale_price', 'mrp', 'img', 'description', 'category')
            ->where('id', $id)
            ->limit(5)
            ->first();

        if (empty($data['product'])) {
            return redirect('/');
        }

        /**
         * Fetch related product
         */

        $data['related_products'] = DB::table('product')
            ->select('id', 'name', 'sale_price', 'mrp', 'img', 'description')
            ->where('category', $data['product']->category)
            ->whereNot('id', $id)
            ->limit(4)
            ->orderByRaw('RAND()')
            ->get();

        $data['title'] = "Product - " . @$data['product']->name;

        return view('frontend.product-details', $data);
    }


    public function about()
    {
        return view('frontend.about', ['title' => 'About']);
    }

    public function contact_us(Request $request)
    {
        $post = $request->all();
        if (!empty($post)) {

            $status = $this->model->contact_us($post);

            echo '<pre>';
            print_r($status);
            die();
        }
        return view('frontend.contact', ['title' => 'Contact Us']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $post = $request->all();
        if (!empty($post)) {
            $validated = $request->validate([
                'email' => 'required|max:40|min:3',
                'password' => 'required|max:10|min:6|',
            ]);

            if (Auth::attempt($credentials)) {
                // password & email has matched so now et session
                $user_data =  DB::table('users')->select('id as user_id', 'name', 'email', 'mobile', 'img')
                    ->where('email', $post['email'])
                    ->where('is_deleted', '0')
                    ->first();

                $session['user_data'] = $user_data;
                $session['user_data']->is_logged_in = true;
                $session['user_data']->logged_time = time();
                session($session);
                return redirect()->intended('/dashboard');
            }
            return back()->with(['st' => 'failed', 'msg' => 'Invalid login credentials']);
        }
        return view('frontend.login', ['title' => 'Login']);
    }
    public function signup(Request $request)
    {
        $post = $request->all();
        if (!empty($post)) {
            $validated = $request->validate([
                'name' => 'required|max:20|min:3',
                'email' => 'required|unique:users|max:40|min:3',
                'password' => 'required|max:10|min:6|',
                'confirm_password' => 'required|max:10|min:6|same:password',
            ]);

            $status = $this->model->signup($post);
            return redirect('signup')->with($status);
        }
        return view('frontend.signup', ['title' => 'Signup']);
    }
}
