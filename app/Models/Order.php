<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    protected $fillable = ['nama_barang', 'harga', 'deskripsi', 'gambar', 'kategori', 'user_id', 'product_id', 'status', 'quantity', 'lama_penyewaan', 'harga_total'];
}
