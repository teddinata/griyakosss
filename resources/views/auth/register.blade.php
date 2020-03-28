@extends('layouts.login')

@section('title', 'Daftar')

@section('content')
<body>
    <section class="navbar-header-register"></section>
    <section class="section-heading-register">
    <main class="login-container">
       <div class="container" data-aos="fade-right">
           <div class="row page-login d-flex align-items-center">
           <div class="section-left col-12 col-md-6">
              <h1 class="mb-4">Stay With Us <br/> Feel Like Home</h1>
              <img src="frontend/images/login-image.png" 
              alt=""
              class="w-75 d-none d-sm-flex"
              />
           </div>
               <div class="section-right col-12 col-md-4">
                   <div class="card" data-aos="fade-right">
                       <div class="card-body">
                            <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                           <div class="text-center">
                               <img src="frontend/images/logo.png" 
                               alt=""
                               class="w-50 mb-4"
                               />
                           </div>
                           <form>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">{{ __('Nama Lengkap') }}</label>
                                  <input 
                                    type="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required autocomplete="name" autofocus
                                    />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Username') }}</label>
                                    <input 
                                      type="username" 
                                      class="form-control @error('username') is-invalid @enderror" 
                                      id="Username"
                                      name="username" 
                                      value="{{ old('username') }}" 
                                      required autocomplete="username" autofocus
                                       />
                                      @error('username')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="phone">{{ __('Nomor HP') }}</label>
                                    <input 
                                      type="phone" 
                                      class="form-control @error('phone') is-invalid @enderror" 
                                      id="phone" 
                                      name="phone" 
                                      value="{{ old('phone') }}" 
                                      required autocomplete="phone" autofocus
                                      />
                                      @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">{{ __ ('E-Mail Adress')}}</label>
                                <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required autocomplete="email"
                                id="email" 
                                />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">{{ __ ('Password')}} </label>
                              <input 
                                type="password" 
                                class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" 
                                id="password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> {{ __ ('Confirm Password')}}</label>
                                <input id="password-confirm"
                                 type="password" 
                                 class="form-control" 
                                 name="password_confirmation" 
                                 required autocomplete="new-password">
                              </div>
                           
                            <button type="submit" class="btn btn-login btn-block">{{ __('Register') }}</button>
                            <p class="text-center mt-4">
                            <a href="{{ route ('login') }}">Sudah Punya Akun? Login.</a>
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
