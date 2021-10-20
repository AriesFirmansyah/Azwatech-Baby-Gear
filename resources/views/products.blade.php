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
    </style>
@section('body')
<div>
    <div class="container" style="text-align: center;text-transform:capitalize">
        <br>
        <h1>PRODUCTS</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col">
                    <a href="/product-details/{{$product->id}}" class="btn product" style="box-shadow:none">
                        <img src="storage/assets/products/{{ $product->gambar}}" alt="{{ $product->nama_barang }}" style="max-width:300px; height:200px">
                        <h5 style="font-weight: bold">{{ $product->nama_barang }}</h5>
                        <p style="font-size: 17px;font-weight:normal">Rp. {{ number_format($product->harga, 0,",", ".")  }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection