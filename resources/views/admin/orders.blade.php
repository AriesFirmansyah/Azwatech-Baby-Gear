@extends('template/adminTemplate')

@section('title', 'Orders')

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
          <h3 class="navbar-brand">Orderan</h3>
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
                    
                    @if($check == "ada")
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
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Rent Time</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Status</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Total Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Edit Status</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $pesanan)
                                <tr>
                                <th scope="row" class="">
                                    <div class="p-2">
                                    <img src="storage/assets/products/{{$pesanan->gambar}}" alt="{{ $pesanan->nama_barang }}" width="70" class="img-fluid rounded shadow-sm">
                                    <div class="ml-3 d-inline-block align-middle">
                                        <h5 class="mb-0"> 
                                            {{ $pesanan->nama_barang }}
                                        </h5>
                                        <span class="text-muted font-weight-normal font-italic d-block">
                                        Kategori:  {{ $pesanan->kategori }}
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
                                <td class="align-middle">
                                    <strong>{{ $pesanan->lama_penyewaan }} Hari</strong>
                                </td>
                                <th scope="row">
                                    <div class="ui steps">
                                        <div class="active step" style="max-width: 100%">
                                            @if ($pesanan->status == 1)
                                                <i class="shipping fast icon"></i>
                                                <div class="content">
                                                <div class="title">Sedang dikirim</div>
                                                <div class="description">Enter billing information</div>
                                                </div>
                                            @endif
                                            @if ($pesanan->status == 2)
                                                <i class="truck icon"></i>
                                                <div class="content">
                                                <div class="title">Sudah dikirim</div>
                                                <div class="description">Enter billing information</div>
                                                </div>
                                            @endif
                                            @if ($pesanan->status == 3)
                                                <i class="dolly flatbed icon"></i>
                                                <div class="content">
                                                <div class="title">Siap di Pick-up</div>
                                                <div class="description">Enter billing information</div>
                                                </div>
                                            @endif
                                            @if ($pesanan->status == 4)
                                                <i class="clipboard check icon"></i>
                                                <div class="content">
                                                <div class="title">Selesai</div>
                                                <div class="description">Enter billing information</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </th>
                                <td class="align-middle">
                                    <strong>Rp {{ number_format($pesanan->harga_total, 0,",", ".")  }}</strong>
                                </td>
                                <td class="align-middle">
                                    <button class="ui positive button" data-bs-toggle="modal" data-bs-target="#edit{{$pesanan->id}}">
                                        <i class="edit icon"></i>
                                    </button>
                                </td>
                                </tr>
            
                                <!-- Modal -->
                                <div class="modal fade" id="edit{{$pesanan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/adminOrder/{{$pesanan->id}}" method="post">
                                                @csrf
                                                <label>Deskripsi</label>
                                                <select class="form-select" aria-label="Default select example" name="updateStatus">
                                                    <option selected disabled>Open this select menu</option>
                                                    <option value="1">Sedang Dikirim</option>
                                                    <option value="2">Sudah Dikirim</option>
                                                    <option value="3">Siap di Pick-Up</option>
                                                    <option value="4">Selesai</option>
                                                </select>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
            
                        <!-- End -->
                    @else
                        <h1 style="text-align: center">Orderan Kosong</h1>
                    @endif
                </div>
              </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

@endsection
