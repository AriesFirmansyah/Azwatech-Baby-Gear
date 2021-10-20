@extends('template/adminTemplate')

@section('title', 'User List')

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
          <h3 class="navbar-brand">List User</h3>
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
        
                  <!-- Shopping cart table -->
                  <div class="table-responsive" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <table id="productTable" class="table">
                      <thead>
                        <tr>
                          <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Nama Lengkap</div>
                          </th>
                          <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Email</div>
                          </th>
                          <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Alamat</div>
                          </th>
                          <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Jenis Kelamin</div>
                          </th>
                          <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">No Telepon</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $data)
                        <tr>
                          <td class="align-middle" style="text-transform: capitalize;padding-left:15px">
                            <strong>{{$data->firstname}} {{$data->lastname}}</strong>
                          </td>
                          <td class="align-middle">
                            <strong>{{$data->email}}</strong>
                          </td>
                          <td class="align-middle">
                            <strong>{{$data->alamat}}</strong>
                          </td>
                          <td class="align-middle">
                            <strong>{{$data->jenisKelamin}}</strong>
                          </td>
                          <td class="align-middle">
                            <strong>{{$data->noTelp}}</strong>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

@endsection
