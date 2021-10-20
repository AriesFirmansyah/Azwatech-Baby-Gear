<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // use HasFactory;
    protected $fillable = ['nama_barang', 'harga', 'deskripsi', 'gambar', 'stok', 'kategori', 'user_id', 'product_id'];
}
