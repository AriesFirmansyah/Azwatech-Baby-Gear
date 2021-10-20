@extends('template/authTemplate')
@section('title', 'Log in')
@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        body {
            height:100%;
            background: #159957;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #155799, #159957);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #155799, #159957); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background-attachment: fixed;
            background-size: cover;;
        }
        .fontWhite {
            color: rgba(255, 255, 255, 0.897);
        }
        .logo {
            height: 200px;
            width: 100%;
            padding: 20px;
            padding-bottom: 0px
        }
        .inpimage {
            width: 30px;
        }
        form input{
            padding: 10px;
            color: #fff;
            background-color: transparent;
            border: none;
            border-bottom: 3px solid rgba(255, 255, 255, 0.37);
            outline: none;
            font-weight: bold;
            letter-spacing: 4px;
            transition: 0.5s;
            max-width: 100%;
        }

        form input:hover, form input:focus{
            border-bottom: 3px solid rgba(255, 255, 255, .9);
            /border-radius: 5%;
        }

        form input::placeholder{
            color: #d3d1d3;
            font-weight: 200;
            letter-spacing: 3px;
            margin-left: 10px;
        }
        i {
            cursor: pointer;
            float: right
        }
    </style>
@section('body')
<div class="body">
    <div class="position-absolute top-50 start-50 translate-middle" style="padding: 50px;maxwidth: 100%">
        @if (session('status'))
            <div id="status" class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif
            <div style="margin-left: 20px;">
                <h1 class="mt-4 fontWhite"><b>Login</b></h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- <input class="input-field" type="text" placeholder="username" name="username"/>
                            <input class="input-field" type="password" placeholder="password" name="password"/>
                    --}}

                    <div class="input-group mb-3 mt-4">
                        <div class="row">
                            <div class="col-3">
                                <span class="input-group-text" style="background-color: transparent; border:none">
                                    <img src="storage/assets/username.png" alt="username" class="inpimage">
                                </span>
                            </div>
                            <div class="col-7">
                                <input id="email" placeholder="Email" type="email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="margin-left: 3px">

                                {{-- <input id="email" placeholder="Email" type="email" class="inp form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  --}}
                                {{-- style="background-color: transparent; border:none;font-weight:bold; font-size : 18px; color: rgba(255, 255, 255, 0.897)"> --}}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col-3">
                                <span class="input-group-text" style="background-color: transparent; border:none">
                                    <img src="storage/assets/password.png" alt="password" class="inpimage">
                                </span>
                            </div>
                            <div class="col-7">
                                <input id="password" placeholder="Password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                {{-- <input id="password" placeholder="Password" type="password" class="inp form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" 
                                style="background-color: transparent; border:none;font-weight:bold; font-size : 18px; color: rgba(255, 255, 255, 0.897)"> --}}

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-2">
                                <i class="bi bi-eye-fill"  id="togglePassword" style="margin-top: 14px"></i>
                            </div><br>
                            
                        </div>
                        
                        
                    </div>
                    <br>
                    {{-- <div class="form-group">
                        {!! NoCaptcha::display(['data-theme' => 'dark']) !!}

                    </div> --}}
                    <div class="g-recaptcha" data-sitekey="6LcgeQ0bAAAAAIk_SIIcACTYqhlRfJJS9uKymMnQ" data-theme="dark"></div>
                    @if(Session::has('g-recaptcha-response'))
                        <p id="captcha" class="alert {{Session::get('alert-class', 'alert-info' )}}">
                            {{Session::get('g-recaptcha-response')}}
                        </p>
                    @endif 
                    <br>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-transparent" style="border:1px solid rgba(255, 255, 255, 0.897); color: rgba(255, 255, 255, 0.897)">
                            <b>Login</b>
                        </button>
                        <br>
                        <a href="/" class="btn btn-transparent" style="border:1px solid rgba(255, 255, 255, 0.897);color:rgba(255, 255, 255, 0.897)">
                            <b>Back to Home</b>
                        </a> 
                    </div>
                    <p class="fontWhite">Belum punya akun? yuk <a href="/SignUp" style="color: rgba(255, 255, 255, 0.897)">sign up.</a></p>
                </form>
            </div>
    </div>
</div>
<script>
    //Password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('bi-eye-slash-fill');
    });

    </script>
@endsection