<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id' , 'DESC')->get();
        return view('admin.dashboard')->with('products', $products);
    }
    public function showAddForm()
    {
        return view('admin.addItem');
    }
    public function storeItem(Request $request)
    {
        //already validated
        $imageName = '';
        if ($request->hasFile('product_image')) {
            $imageName = time() . '_' . $request->file('product_image')->getClientOriginalName();
            $path = $request->file('product_image')->storeAs('public/thumbs', $imageName);
        } else {
            $imageName = 'no image found';
        }
        Product::create([
            'product_title' => $request->product_title,
            'product_desc' => $request->product_desc,
            'product_price' => $request->product_price,
            'product_image' => $imageName
        ]);
        return redirect()->route('dashboard.add')->with('status', 'product added successfully');
    }
    public function showEditPage($id)
    {
        $product = Product::find($id);
        return view('admin.edit')->with('product', $product);
    }
    public function storeChanges(Request $request, $id)
    {
        $product = Product::find($id);
        $imageName = $product->product_image;
        if ($request->hasFile('product_image')) {
            $imageName = time() . '_' . $request->file('product_image')->getClientOriginalName();
            $path = $request->file('product_image')->storeAs('public/thumbs', $imageName);
        }
        $product->product_title = $request->product_title;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->product_image = $imageName;
        $product->save();
        return redirect()->route('dashboard.index');
    }
    public function destroy($id) {
       $product = Product::find($id);
       $product->delete();
       return back();
    }
}
