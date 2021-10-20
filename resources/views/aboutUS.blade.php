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
    </style>
@section('body')
<div class="container" style="text-align: center">
    <br>
    <h1>WHO WE ARE</h1>
    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
    <div class="row">
        <!-- Aries -->
            <div class="col-md-6">
                <img src="{{ asset('storage/assets/aris.png') }}" alt="aris" style="max-height: 300px;max-width:100%">
            </div>
            <div class="col-md-6" style="text-align: left">
                <br><br>
                <h3>Aries Firmansyah</h3>
                <h5 class="text-muted"><b>Front-End dan Back-End</b></h5>
                <p style="text-align: justify">Mahasiswa yang tinggal di sepatan ini merupakan ahli dalam bidang web programing. Beliaulah yang telah membuat tampilan dari website mainan "Azwatech" ini. Dari konsep yang sudah disetujui, Artis (sapaan akrabnya) mengembangkan web dengan tampilan yang menarik, yang hasilnya dapat anda nikmati ini.</p>
            </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
@endsection