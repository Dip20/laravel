<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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

            $model = new HomeModel();
            $status = $model->contact_us($post);

            echo '<pre>';
            print_r($status);
            die();
        }
        return view('frontend.contact', ['title' => 'Contact Us']);
    }

    public function login(Request $request)
    {
        $post = $request->all();
        if (!empty($post)) {

            $model = new HomeModel();
            $status = $model->login($post);

            echo '<pre>';
            print_r($status);
            die();
        }
        return view('frontend.login', ['title' => 'Login']);
    }
    public function signup(Request $request)
    {
        $post = $request->all();
        if (!empty($post)) {

            $model = new HomeModel();
            $status = $model->signup($post);

            echo '<pre>';
            print_r($status);
            die();
        }
        return view('frontend.signup', ['title' => 'Signup']);
    }
}
