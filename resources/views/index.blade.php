@extends('template/mainTemplate')
@section('title', 'Azwatech')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .recomended1 {
            background: #11998e;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #38ef7d, #11998e);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #38ef7d, #11998e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            padding: 10px;
            padding-left: 30px;
            text-decoration: underline;
            border-radius: 10px;
        }
        .recomended2 {
            background: #FC5C7D;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #6A82FB, #FC5C7D);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #6A82FB, #FC5C7D); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            padding: 10px;
            padding-left: 30px;
            text-decoration: underline;
            border-radius: 10px;
        }
        
    </style>
@section('body')
<div>
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="5000">
            <a href="#rekomendasi1">
              <img src="storage/assets/carousel1.png" class="d-block w-100" style="max-height: 100%">
            </a>
          </div>
          <div class="carousel-item" data-bs-interval="5000" >
            <a href="#rekomendasi2">
              <img src="storage/assets/carousel2.png" class="d-block w-100" style="max-height: 100%">
            </a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container text-center">
        <br>
        <h2>Mengapa memilih Azwatech?</h2>
        <p>Azwatech telah dipercaya selama 5 tahun selalu memberikan pelayanan terbaik berupa mainan-mainan pilihan yang berkualitas bintang 5 dengan jaminan mutu dan kebersihannya serta harganya yang pasti sepadan dengan kualitas.</p>
        <br>
        <div data-aos="fade-up">
        <div id="rekomendasi1" class="recomended1" style="max-width: 100%">
            <h2>Rekomendasi untuk anak perempuan!</h2>
        </div>
        <div class="row">
            @foreach ($products as $data)
                @if($data->kategori == "Spesial 1")
                    <div class="col" style="text-transform:capitalize">
                        <a href="/product-details/{{$data->id}}" class="btn product" >
                            <img src="{{ asset('storage/assets/products/'.$data->gambar) }}" alt="{{ $data->nama_barang }}"  style="max-width: 300px;height:200px">
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
                            <img src="{{ asset('storage/assets/products/'.$data->gambar) }}" alt="{{ $data->nama_barang }}" style="max-width: 300px;height:200px">
                            <h5 style="font-weight: bold">{{ $data->nama_barang }}</h5>
                            <p style="font-size: 17px;font-weight:normal">Rp. {{ number_format($data->harga, 0,",", ".")  }}</p>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
        <br><br><br>
    </div>
</div>

@endsection