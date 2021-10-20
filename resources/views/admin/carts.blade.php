@extends('template/adminTemplate')

@section('title', 'Carts')

@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 

  <style>

  </style>
@section('body')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        
        <div class="navbar-wrapper">
          <h3 class="navbar-brand">Carts</h3>
          @if (session('status'))
            <div id="status" class="alert alert-success position-absolute top-0 end-0" style="margin-right:30px;margin-top:30px" role="alert">
              {{ session('status') }}
            </div>
          @endif
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
      </div>
    </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    
                    @if ($check == "ada")
                        <!-- Shopping cart table -->
                        <div class="table-responsive" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                        <table id="productTable" class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Item</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">QUANTITY</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($carts as $pesanan)
                            <tr>
                                <th scope="row" class="">
                                    <div class="p-2">
                                    <img src="storage/assets/products/{{ $pesanan->gambar}}" alt="{{ $pesanan->nama_barang }}" width="70" class="img-fluid rounded shadow-sm">
                                    <div class="ml-3 d-inline-block align-middle">
                                        <h5 class="mb-0"> 
                                            {{ $pesanan->nama_barang }}
                                        </h5>
                                        <span class="text-muted font-weight-normal font-italic d-block">
                                        Kategori: {{ $pesanan->kategori }}
                                        </span>
                                    </div>
                                    </div>
                                </th>
                                <td class="align-middle">
                                    <strong id="harga">Rp {{ number_format($pesanan->harga, 0,",", ".")  }}</strong>
                                </td>
                                <td class="align-middle">
                                    <strong id="quantity" style="border: 1px solid rgb(196, 196, 196);padding:10px">1</strong>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h1 style="text-align: center">Keranjang Kosong</h1>
                    @endif
                      </tbody>
                    </table>
                  </div>
                  <!-- End -->
                </div>
              </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

@endsection
