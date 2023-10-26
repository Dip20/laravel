<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.index', ['title' => 'Home']);
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
}
