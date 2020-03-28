@extends('layouts.login')

@section('title', 'Login')

@section('content')

<body>
    <section class="navbar-header-login"></section>
    <section class="section-heading-login">
    <main class="login-container">
       <div class="container" data-aos="fade-right">
           <div class="row page-login d-flex align-items-center">
           <div class="section-left col-12 col-md-6">
              <h1 class="mb-4">Stay With Us <br/> Feel Like Home</h1>
              <img src="{{url ('frontend/images/login-image.png')}}" 
              alt=""
              class="w-75 d-none d-sm-flex"
              />
           </div>
               <div class="section-right col-12 col-md-4">
                   <div class="card" data-aos="fade-right" >
                       <div class="card-body">
                           
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                           <div class="text-center">
                               <img src="frontend/images/logo.png" 
                               alt=""
                               class="w-50 mb-4"
                               />
                           </div>
                           
                           <form>
                            <div class="form-group">
                              <label for="exampleInputEmail1">{{ __('E-Mail Address') }}</label>
                              <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                               
                               
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            
                            <div class="form-group">
                              <label for="exampleInputPassword1">{{ __('Password') }}</label>
                              <input 
                                type="password" 
                                class="form-control  @error('password') is-invalid @enderror"  
                                name="password" required autocomplete="current-password">
                                
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group form-check">
                              <input 
                                type="checkbox"
                                class="form-check-input" 
                                id="exampleCheck1"
                                {{ old('remember') ? 'checked' : '' }}/>
                              <label class="form-check-label" for="exampleCheck1">{{ __('Remember Me') }}</label>
                            </div>
                            <button type="submit" class="btn btn-login btn-block">{{ __('Login') }}</button>

                            <p class="text-center mt-4">
                                    <a href="{{ route ('register') }}">{{ __ ('Belum Punya Akun? Daftar Disini') }}</a>
                                    </p>
                            
                            <p class="text-center mt-4">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </p>
                          </form>
                       </div>
                   </div>
              </div>
           </div>
          </div>
       
    </main>
</section>


@endsection
