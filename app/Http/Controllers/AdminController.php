<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new category;

        $data->category_name = $request->category;

        $data -> save();

        return redirect()->back()->with('message','Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category has been deleted Successfully!!');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new product;

        $product -> title = $request -> title;
            // title is the name of the product database table column name in database
            // 2nd title is the word which we have given name inside the input field as name= "title"
        $product -> description = $request -> description;
        $product -> price = $request -> price;
        $product -> quantity = $request -> quantity;
        $product -> discount_price = $request -> des_price;
        $product -> category = $request -> category;

        // for storing image  inside database is different than above:
        $image=$request->image;
            // above line is for storing image inside $image variable
        $imagename=time().'.'.$image->getClientOriginalExtension();
            //above $imagename is for giving the unique name  with time function.
        $request->image->move('product',$imagename);
            // MAKE A NEW FOLDER INSIDE THE public folder - MAKE NEW FOLDER WITH NAME "product"

        $product -> image = $imagename;
            // now the image will store inside the "product" folder which is inside public folder



        $product->save();

        return redirect()->back()->with('message','Product has been added Successfully!!');
    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function product_delete($id)
    {
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Product has been Deleted Successfully!!');
    }

    public function product_update($id)
    {
        $product=product::find($id);

        $category=category::all();

        return view('admin.product_update',compact('product','category'));
    }

    public function product_update_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->title=$request->title;
        $product -> description = $request -> description;
        $product -> price = $request -> price;
        $product -> quantity = $request -> quantity;
        $product -> discount_price = $request -> des_price;
        $product -> category = $request -> category;

        // for storing image  inside database is different than above:
            $image=$request->image;
            // above line is for storing image inside $image variable
            if($image)
            {
        $imagename=time().'.'.$image->getClientOriginalExtension();
            //above $imagename is for giving the unique name  with time function.
        $request->image->move('product',$imagename);
            // MAKE A NEW FOLDER INSIDE THE public folder - MAKE NEW FOLDER WITH NAME "product"

        $product -> image = $imagename;
            // now the image will store inside the "product" folder which is inside public folder
            }


            $product->save();

            return redirect()->back()->with('message','Product has been updated Successfully!!');
    }
}
