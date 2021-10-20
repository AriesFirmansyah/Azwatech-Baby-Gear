@extends('template/mainTemplate')
@section('title', 'Products')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .product:hover {
            opacity: 0.3
        }
        .recomended1 {
            background: #800080;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #ffc0cb, #800080);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #ffc0cb, #800080); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            padding: 10px;
            padding-left: 30px;
            text-decoration: underline;
            border-radius: 10px;
        }
        .recomended2 {
            background: #fc4a1a;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #f7b733, #fc4a1a); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            padding: 10px;
            padding-left: 30px;
            text-decoration: underline;
            border-radius: 10px;
        }

    </style>
@section('body')
<div>
    <div class="container">
        @if (session('status'))
            <div id="status" class="alert alert-success position-absolute top-0 end-0" style="margin-right:30px;margin-top:30px" role="alert">
              {{ session('status') }}
            </div>
        @endif
        <br>
        <h1><b>PRODUCT DETAILS</b></h1>
        <div data-aos="zoom-in">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/assets/products/'.$product->gambar) }}" alt="{{ $product->nama_barang }}" style="max-width: 500px;max-height:100%">
            </div>
            <div class="col-md-5 offset-1" >
                <h5 style="font-weight: bold;text-transform: capitalize">{{ $product->nama_barang }}</h5>
                <p style="font-size: 18px;font-weight:normal">{{ $product->deskripsi }}</p>
                <p style="font-size: 17px;font-weight:normal">Rp. {{ number_format($product->harga, 2,",", ".")  }}</p>
                <a href="/addToCart/{{$product->id}}">
                    <button class="btn btnCart" style="border-radius: 7px;font-size:17px;">
                        <i class="bi bi-cart-plus-fill"></i>
                        ADD TO CART
                    </button>
                </a>

            </div>
        </div>
        </div>
        <br><br><br><br>
        <div data-aos="fade-up">
        <div class="container text-center">
            <div id="rekomendasi1" class="recomended1" style="max-width: 100%">
                <h2>Rekomendasi untuk anak perempuan!</h2>
            </div>
            <div class="row">
                @foreach ($products as $data)
                    @if($data->kategori == "Spesial 1")
                        <div class="col" style="text-transform:capitalize">
                            <a href="/product-details/{{$data->id}}" class="btn product" >
                                <img src="{{ asset('storage/assets/products/'.$data->gambar) }}" alt="{{ $data->nama_barang }}"  style="max-width: 300px">
                                <h5 style="font-weight: bold">{{ $data->nama_barang }}</h5>
                                <p style="font-size: 17px;font-weight:normal">Rp. {{ number_format($data->harga, 0,",", ".")  }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            </div>
            <br>
            <div data-aos="fade-up">
            <div id="rekomendasi2" class="recomended2" style="max-width: 100%">
                <h2>Rekomendasi untuk anak laki-laki!</h2>
            </div>
            <div class="row">
                @foreach ($products as $data)
                @if($data->kategori == "Spesial 2")
                        <div class="col" style="text-transform:capitalize">
                            <a href="/product-details/{{$data->id}}" class="btn product" >
                                <img src="{{ asset('storage/assets/products/'.$data->gambar) }}" alt="{{ $data->nama_barang }}" style="max-width: 300px">
                                <h5 style="font-weight: bold">{{ $data->nama_barang }}</h5>
                                <p style="font-size: 17px;font-weight:bold">Rp. {{ number_format($data->harga, 0,",", ".")  }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            </div>
            <br>
        </div>
    </div>
    <br>
    <br>
</div>

@endsection