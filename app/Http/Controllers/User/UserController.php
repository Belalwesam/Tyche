<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cartitem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function shopPage()
    {
        $products = Product::all();
        return view('user.shop')->with('products', $products);
    }
    public function registerPage()
    {
        return view('user.register');
    }
    public function storeUser(Request $request)
    {
        //validate inputs 
        $this->validate($request, [
            'user_name' => 'required',
            'user_email' => 'required|email',
            'password' => 'required',
        ]);
        User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'password' => Hash::make($request->password),
        ]);
        if (Auth::attempt($request->only('user_email', 'password'))) {
            return redirect()->route('user.shop');
        } else {
            return back()->with('registerFailstatus', "Opeartion can't processced right now .");
        }
    }
    public function loginPage()
    {
        if (auth()->user()) {
            $cart_items = User::find(auth()->user()->id)->cart_items;
            $cart_products = [];
            foreach($cart_items as $cart_item) {
                $product_to_add = Product::find($cart_item->product_id);
                array_push($cart_products , $product_to_add);
            };
            return view('user.login')->with('cart_items', $cart_items)->with('cart_products' , $cart_products);
        } else {
            return view('user.login');
        }
    }
    public function attemptLogin(Request $request)
    {
        //already validated 
        if (Auth::attempt($request->only('user_email', 'password'))) {
            return redirect()->route('user.shop');
        } else {
            return redirect()->route('user.login')->with('status', 'password or email incorrect');
        }
    }
    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
    public function addItemToCart($id)
    {
        Cartitem::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id
        ]);
    }
    public function removeCartItem($id) {
        $item = Cartitem::find($id);
        $item->delete();
    }
}
