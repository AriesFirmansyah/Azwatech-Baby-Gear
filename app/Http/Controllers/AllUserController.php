<?php

namespace App\Http\Controllers;
use \App\Models\Product;
use \App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AllUserController extends Controller
{
    public function index() {
        $products = Product::all();
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->count();
            return view('index', ['products' => $products, 'jumlah' => $jumlah]);
        } else {
            return view('index', ['products' => $products]);
        }
    }
    public function login() {
        return view('authentication.login');
    }
    public function signup() {
        return view('authentication.signup');
    }
    public function products() {
        $products = Product::all();
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->count();
            return view('products', ['products' => $products, 'jumlah' => $jumlah]);
        } else {
            return view('products', ['products' => $products]);
        }
    }
    public function product_details(Product $id) {
        $products = Product::all();
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->count();
            return view('productDetails', ['product' => $id, 'products' => $products, 'jumlah' => $jumlah]);
        } else {
            return view('productDetails', ['product' => $id, 'products' => $products]);
        }
    }
    public function aboutUS() {
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->count();
                  
            return view('aboutUS', ['jumlah' => $jumlah]);
        } else {
            return view('aboutUS');
        }
    }
    public function contactUS() {
        if(!empty(Auth::user()->id)) {
            $jumlah = DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->count();
            return view('contactUS', ['jumlah' => $jumlah]);
        } else {
            return view('contactUS');
        }
    }
}


