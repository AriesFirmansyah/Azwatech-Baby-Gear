<?php

namespace App\Http\Controllers;
use \App\Models\Product;
use \App\Models\Cart;
use \App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addToCart(Product $data){
        $keranjang = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->where('product_id', $data->id)
            ->get();
            // $keranjang;
        $tes = (array) null;
        if($keranjang == "[]") {
            // return "kosong";\
            Cart::create([
                'nama_barang' => $data->nama_barang,
                'harga' => $data->harga,
                'deskripsi' => $data->deskripsi,
                'gambar' => $data->gambar,
                'stok' => $data->stok,
                'kategori' => $data->kategori,
                'user_id' => Auth::user()->id,
                'product_id' => $data->id
             ]);
            return redirect('/product-details/'.$data->id)->with('status', "Produk berhasil ditambahkan ke keranjang");
           
        } else {
            // return "ada";
            return redirect('/product-details/'.$data->id)->with('status', "Maaf, 1 user hanya dapat memesan 1 pada setiap produk");
        }

        // return redirect('/product-details/'.$data->id)->with('status', "Product berhasil ditambahkan ke keranjang!");
    }
    public function carts(Request $data){
        $keranjang = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->get();
       
        // $tes = (array) null;
        if($keranjang == "[]") {
            $jumlah = DB::table('carts')
                ->where('user_id', Auth::user()->id)
                ->count();
            return view('carts', ['jumlah' => $jumlah, 'cekdata' => "kosong"])->with('kosong', "Keranjang kosong");
            
        } else {
            $jumlah = DB::table('carts')
                ->where('user_id', Auth::user()->id)
                ->count();

            $totalHarga = DB::table('carts')
                ->where('user_id', Auth::user()->id)
                ->sum('harga');
                
            if(!empty($data->updateHari)){
                $totalHarga *= $data->updateHari;
                $totalHarga = number_format($totalHarga, 2,",", ".");
                return view('carts', ['data' => $keranjang, 'jumlah' => $jumlah, 'hargatotal' => $totalHarga, 'updateHari' => $data->updateHari, 'cekdata' => "ada"]);

            }else {
                $totalHarga = number_format($totalHarga, 2,",", ".");
                return view('carts', ['data' => $keranjang, 'jumlah' => $jumlah, 'hargatotal' => $totalHarga, 'updateHari' => 1, 'cekdata' => "ada"]);
            }
        }
    }
    public function deleteItem(Cart $data) {
        Cart::destroy($data->id);
        return redirect('/carts')->with('status', "Item berhasil dihapus!");
    }
    public function updateHari(Request $data){
        return redirect('/carts')->with('updateHari', $data->updateHari);
    }
    public function keranjangOrder( $data) {
        $keranjang = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->get();
       
        $jumlah = DB::table('carts')
            ->where('user_id', Auth::user()->id)
            ->count();
        // $tes = (array) null;
        if($jumlah == 0) {
            return view('carts', ['jumlah' => $jumlah, 'cekdata' => "kosong"])->with('status', "Keranjang kosong");
            
        } else {
            $validasi = true;
            foreach($keranjang as $order) {
                $check = DB::table('orders')
                    ->where('user_id', Auth::user()->id)
                    ->where('product_id', $order->product_id)
                    ->count();
                $total = $order->harga * $data;

                if($check !== 0) {
                    $validasi = false;
                } 
            }
            
            if($validasi == true){
                foreach($keranjang as $order) {
                    DB::table('products')
                        ->where('id', $order->product_id)
                        ->decrement('stok');

                    Order::create([
                        'nama_barang' => $order->nama_barang,
                        'harga' => $order->harga,
                        'deskripsi' => $order->deskripsi,
                        'gambar' => $order->gambar,
                        'kategori' => $order->kategori,
                        'user_id' => Auth::user()->id,
                        'product_id' => $order->product_id,
                        'status' => 1,
                        'quantity' => 1,
                        'lama_penyewaan' => $data,
                        'harga_total' => $total
                        ]);
                        
                    DB::table('carts')
                    ->where('user_id', Auth::user()->id)
                    ->delete();
                }
                return redirect('/carts')->with('status', "Persanan anda berhasil di order!");
            }else {
                return redirect('/carts')->with('status', "Maaf, salah satu produk sudah ada di order anda!");
            }
        }
    }
    public function order(){
        $jumlah = DB::table('carts')
                ->where('user_id', Auth::user()->id)
                ->count();
        
        $dataOrder = Order::where('user_id',  Auth::user()->id)->get();
        return view('order', ['jumlah' => $jumlah, 'data' => $dataOrder]);
    }
    public function updateStatus(Request $status, Order $data) {
        if ($status->updateStatus == 3) {
            Order::where('id', $data->id)
                ->update([
                    'status' => $status->updateStatus
            ]);
            return redirect('/order')->with('status', 'Pesanan berhasil di update!');
        } else {
            return redirect('/order');
        }
    }
}
