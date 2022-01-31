<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductCategoryController;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create(){

        $products = Product::paginate('5');
        $data = ProductCategory::all();
        // dd($data);

        return view('admin.product.create_product', compact('products','data'));

    }
    public function store(Request $request){

        $product = new Product();

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }


        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $cat =$product->category_id = $request->input('category_id');
        // dd($cat);
        $product->save();

        return redirect()->back()->with('status','Product Added Successfully');

    }

    public function fetch(){
        // $products = Product::all();
       $products = Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
        ->get(['products.*', 'product_categories.name']);
        // dd($products);

        return view('admin.product.fetch_product', compact('products'));
    }

    public function edit($id){
        // dd(1);
        $products = Product::find($id);
        $data = ProductCategory::all();

        return view('admin.product.edit_product', compact('products','data'));

    }
    public function update(Request $request,$id){
        // dd(1);
        $product = Product::find($id);
        // dd($product);
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('public/uploads/products/', $filename);
                $product->image = $filename;

            }
        // dd($request->all());
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $idd =$product->category_id= $request->input('category_id');
        // dd($idd);
        $product->update();
        return redirect('show-product')->with('status','Product Updated Successfully');

    }

    public function destroy($id){

        $student = Product::find($id);
        $student->delete();
        return redirect()->back()->with('status','Product Deleted Successfully');

    }

    public function search(Request $request){

        $id = Auth::id();
        $data = Product::find($id);

        $search = $request->search;
        // dd($search);

        $products=Product::where('description','Like','%'.$search.'%')
                        ->orWhere('title','Like','%'.$search.'%')
                        ->orWhere('price','Like','%'.$search.'%')
                        ->orWhere('quantity','Like','%'.$search.'%')
                        ->orWhere('category_id','Like','%'.$search.'%')
                        ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
                        ->get(['products.*', 'product_categories.name']);

        return view('admin.product.fetch_product',compact('products','data'));

    } //user-search-bar
}
