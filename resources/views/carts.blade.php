@extends('template/mainTemplate')
@section('title', 'Cart')
@section('styles')
@section('script')
<script>

  </script>    
@endsection

@section('body')
@if (session('status'))
  <div id="status" class="alert alert-success position-absolute top-0 end-0" style="margin-right:30px;margin-top:30px" role="alert">
    {{ session('status') }}
  </div>
@endif
@if ($cekdata == "ada")
  <div class="pb-5">
    <div class="container">
      
      <br>
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

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
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach ($data as $pesanan)
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
                    <form action="/keranjang/{{ $pesanan->id }}" method="post">
                      @method('delete')
                      @csrf
                      <td class="align-middle">
                        <button type="submit" class="btn btn-danger" style="border-radius: 50%;margin-left:10px">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </td>
                    </form> 
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="row bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold ">
            <div class="col-6">
              Lama Penyewaan
            </div>
            <div class="col-6">
              <button style="border: 1px solid rgb(196, 196, 196);text-decoration:none;color:black;padding:10px;border-radius:4px">
                {{-- @if (session('updateHari'))
                  {{ session('updateHari') }}
                @else 
                @endif --}}
                {{$updateHari}}
              </button>
                Hari
              <button class="btn btn-success rounded-pill py-2 btn-block" data-bs-toggle="modal" data-bs-target="#updatehari">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
              </button>
            </div>
          </div>
          <!-- End -->
        </div>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="updatehari" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lama Penyewaan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/carts" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="number" class="form-control" aria-describedby="basic-addon2" style="max-width: 70px" name="updateHari" value="{{$updateHari}}">
                  <span class="input-group-text" id="basic-addon2">Hari</span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
        <div class="p-4">
            <li class="d-flex justify-content-between py-3 border-bottom">
              <strong class="text-muted">Total harga : Rp 
                {{$hargatotal}}
              </strong>
              <h5 class="font-weight-bold"></h5>
            </li>
        </div>
        <a href="/keranjangOrder/{{$updateHari}}">
          @csrf
          <button type="submit" class="btn btn-success rounded-pill py-2 btn-block" style="margin-left:20px">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
              <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
              <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
            </svg>
            ORDER
          </button>
        </a> 
      </div>
      </div>
    </div>
    @else
      <br>
      <h4 style="text-align: center">Keranjang kosong, yuk klik tombol dibawah untuk belanja. . .</h4>
      <div style="text-align: center">
        <br>
        <a href="/products" class="btn btn-warning" style="border-radius:14px">
          <b>BELANJA SEKARANG!</b>
        </a>
        <br>
      </div>
      <br>
    @endif
<script>



</script>

      
@endsection