<?php

namespace App\Http\Controllers;
use \App\Models\Product;
use \App\Models\Order;
use \App\Models\User;
use \App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = DB::table('orders')->count();
        $revenue = DB::table('orders')->sum('harga');
        $users = DB::table('users')->count();
        $carts = DB::table('carts')->count();
        $revenue = number_format($revenue, 2,",", ".");
        return view('admin.admin', ['orders' => $orders, 'revenue' => $revenue, 'users' => $users, 'carts' => $carts]);
    }
    public function products()
    {   
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }
    public function orders() {
        $check = DB::table('orders')->count();
        if($check !== 0) {
            $orders = Order::all();
            return view('admin.orders', ['orders' => $orders,  'check' => 'ada']);
        } else {
            return view('admin.orders', ['check' => 'kosong']);
        }

    }

    public function updateStatus(Request $status, Order $data) {
        if ($status->updateStatus > 0 && $status->updateStatus <= 4) {
            Order::where('id', $data->id)
                ->update([
                    'status' => $status->updateStatus
            ]);
            return redirect('/adminOrders')->with('status', 'Item berhasil di update!');
        } else {
            return redirect('/adminOrders');
        }

    }
    public function listUser()
    {
        $users = User::all();
        return view('admin.listUser', ['users' => $users]);
    }
    public function carts() {
        $check = DB::table('carts')->count();
        if($check !== 0) {
            $carts = Cart::all();
            return view('admin.carts', ['carts' => $carts, 'check' => 'ada']);
        } else {
            return view('admin.carts', ['check' => 'kosong']);
        }
    }
    public function addProduct() {
        return view('admin.addProduct');
    }
    public function doAddProduct(Request $request) {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required' , 'max:255',
            'stok' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',
        ]);
        $gambar = $request->file('gambar')->getClientOriginalName();
        $addData = new Product();
        $addData->nama_barang = $request->nama;
        $addData->harga = $request->harga;
        $addData->deskripsi = $request->deskripsi;
        $addData->stok = $request->stok;
        $addData->gambar =  $gambar;
        $addData->kategori = $request->kategori;
        $request->file('gambar')->storeAs('/public/assets/products', $gambar);
        $addData->save();

        return redirect('/adminProducts')->with('status', "Product berhasil ditambahkan!");
    }

    public function editProduct(Request $request, Product $data)
    {
        if(empty($request->gambar)) {
            $request->validate([
                'nama' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
                'stok' => 'required',
                'kategori' => 'required',
            ]);

            Product::where('id', $request->id)
                ->update([
                    'nama_barang' => $request->nama,
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'stok' => $request->stok,
                    'kategori' => $request->kategori,
            ]);
            return redirect('/adminProducts')->with('status', 'Product berhasil di update!');
        } else {
            $gambar_baru = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->storeAs('/public/assets/products', $gambar_baru);

            $request->validate([
                'nama' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
                'stok' => 'required',
                'kategori' => 'required',
            ]);

            Product::where('id', $request->id)
                ->update([
                    'nama_barang' => $request->nama,
                    'harga' => $request->harga,
                    'deskripsi' => $request->deskripsi,
                    'gambar' => $gambar_baru,
                    'stok' => $request->stok,
                    'kategori' => $request->kategori,
            ]);
            return redirect('/adminProducts')->with('status', 'Product berhasil di update!');
        }
    }
    public function destroy(Product $data)
    {
        Product::destroy($data->id);
        return redirect('/adminProducts')->with('status', "Product berhasil dihapus!");
    }
}
