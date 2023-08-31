<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\product;
use App\Models\Cart;

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

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            // return redirect()->back();
            $user = Auth::user();

            // dd($user);
            // using "dd($user);", we will get the user data after clicking the add to cart button on the product page

            $product = product::find($id);

            // dd($product);

            $cart = new Cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            // $cart->name is the the data table heading name of the cart check on the cart table phpmyadmin
            //$user->name is the data table heading taken from the user table .. check on the user table phpmyadmin

            $cart->product_title=$product->title;

            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price*$request->quantity ;
            }
            else{

                $cart->price=$product -> price*$request->quantity;

            }

            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();



        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;

            $cart = cart::where('user_id','=',$id)->get();
            return view('home.show_cart',compact('cart'));
        }

        else
        {
            return redirect('login');
        }

    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();

    }
}
