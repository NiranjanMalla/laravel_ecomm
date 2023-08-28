<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\product;

class HomeController extends Controller
{
    public function index()
    {
        // $product = product::all();
        // inorder to show product on the index page with limited number of product do following
        $product = product::paginate(10);
        return view('home.userpage',compact('product'));
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            // return view('home.userpage');
            $product = product::paginate(10);
            return view('home.userpage',compact('product'));
        }
    }

    public function product_detail($id)
    {
        $product = product::find($id);
        return view('home.product_detail',compact('product'));
    }
}
