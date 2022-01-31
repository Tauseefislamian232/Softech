<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    public function create(){

        $product_category = ProductCategory::all();
        // dd($product_category);
        return view('admin.product.create_category',compact('product_category'));

    }

    public function store(Request $request){
        // dd($request->name);
        $product_category = new ProductCategory;
        $product_category->name = $request->name;
        $product_category->save();
        return redirect('add-product-category')->with('success',"Category added Successfully!");
    }

    public function fetch(){

        $product_category = ProductCategory::all();
        // dd($product_category);
        return view('admin.product.create_category',compact('product_category'));

    }

    public function edit($id){
        // dd(3);
        $edit_category = ProductCategory::find($id);
        // dd($edit_category);
        return view('admin.product.edit_category',compact('edit_category'));

    }
    public function update(Request $request, $id){

        $update_category =ProductCategory::find($id);
        $update_category->name = $request->name;

        $update_category->save();
        return redirect('add-product-category')->with('success',"Category Updated Successfully!");

    }

    public function destroy($id){

        $prod_cat = ProductCategory::find($id);
        $prod_cat->delete();
        return redirect('add-product-category')->with('success',"Category Deleted Successfully!");
    }
    public function search(Request $request){

        $id = Auth::id();
        $data = ProductCategory::find($id);

        $search = $request->search;
        // dd($search);

        $product_category=ProductCategory::where('name','Like','%'.$search.'%')
                        ->orWhere('id','Like','%'.$search.'%')
                        ->paginate('1');

        return view('admin.product.create_category',compact('product_category','data'));

    } //user-search-bar
}
