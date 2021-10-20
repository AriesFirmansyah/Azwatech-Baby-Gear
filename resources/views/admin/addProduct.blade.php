@extends('template/adminTemplate')

@section('title', 'Add Product')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 
  <style>
      
    .adminTitle{
        text-align: center;
    }
    .bg {
        background-color: rgb(226, 230, 248);
    }
    .fileinput-preview {
        width: 30px
    }
  </style>
@section('body')
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="javascript:;">Add Product</a>
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
                <div class="col-12">
                    <form action="/addProduct" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" >
                          @error('nama')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="harga">Harga</label>
                          <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" >
                          @error('harga')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3"></textarea>
                          @error('deskripsi')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control form-control-lg @error('gambar') is-invalid @enderror" name="gambar">
                          @error('gambar')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="stok">Stok</label>
                          <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok">
                          @error('stok')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori">
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
</div>
@endsection
