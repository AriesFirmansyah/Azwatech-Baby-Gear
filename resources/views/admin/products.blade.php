@extends('template/adminTemplate')

@section('title', 'Products')

@section('styles')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 

  <style>
    .adminTitle{
        text-align: center;
    }
    .bg {
        background-color: rgb(226, 230, 248);
    }
    input {
        font-size: 20px
    }
  </style>
@section('body')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        
        <div class="navbar-wrapper">
          <h3 class="navbar-brand">Products</h3>
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
          <a href="/adminAddProduct">
            <button class="btn btn-info">
              <span class="material-icons">add_circle</span>
              Add Product
            </button>
          </a>
          <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr style="font-weight: bold">
                            <th>#</th>
                            <th><h5>Product</h5></th>
                            <th><h5>Harga</h5></th>
                            <th><h5>Deskripsi</h5></th>
                            <th><h5>Gambar</h5></th>
                            <th><h5>Stok</h5></th>
                            <th><h5>Kategori</h5></th>
                            <th><h5>Actions</h5></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item) 
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_barang}}</td>
                                <td>Rp {{$item->harga}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td>
                                    <img src="storage/assets/products/{{$item->gambar}}" alt="{{$item->nama_barang}}" style="width: 70px">
                                </td>
                                <td>{{$item->stok}}</td>
                                <td>{{$item->kategori}}</td>
                                <td>
                                    {{-- <a href="" style="text-decoration: none" data-toggle="modal" data-target="{{$item->id}}"> --}}
                                        <button class="btn btn-success btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#{{$item->id}}">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    {{-- </a> --}}
                                    <form action="/adminProduct/{{ $item->id }}" method="POST" class="d-inline">
                                      @method('delete')
                                      @csrf
                                      <button class="btn btn-danger btn-fab btn-fab-mini btn-round" type="submit">
                                          <i class="material-icons">delete</i>
                                      </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="{{$item->id}}" class="modal bd-example-modal-lg" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" style="border: none">Edit Data</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="/editProduct/{{$item->id}}" method="post" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <div class="form-group">
                                          <label for="id">ID</label>
                                          <input type="number" class="form-control @error('id') is-invalid @enderror" value="{{$item->id}}" disabled>
                                          <input type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$item->id}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="nama">Nama</label>
                                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$item->nama_barang}}">
                                          @error('nama')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="harga">Harga</label>
                                          <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{$item->harga}}">
                                          @error('harga')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="deskripsi">Deskripsi</label>
                                          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{$item->deskripsi}}" rows="3">{{$item->deskripsi}}</textarea>
                                          @error('deskripsi')
                                          <div class="invalid-feedback">
                                            {{$message}}
                                          </div>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" class="form-control form-control-lg @error('gambar') is-invalid @enderror" name="gambar" value="{{$item->gambar}}">
                                          @error('gambar')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="stok">Stok</label>
                                          <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{$item->stok}}">
                                          @error('stok')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="kategori">Kategori</label>
                                          <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{$item->kategori}}">
                                          @error('kategori')
                                            <div class="invalid-feedback">
                                              {{$message}}
                                            </div>
                                          @enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
