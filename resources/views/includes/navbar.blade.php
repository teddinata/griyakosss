 <!-- Navbar -->
 <div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ url ('/')}}" class="navbar-brand">
        <img src="{{ url ('frontend/images/logo.png')}}" alt="Logo GriyaKos">
        </a>
        <button class="navbar-toggler navbar-toggler-right"
         type="button"
         data-toggle="collapse"
         data-target="#navb"
        >
         <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse"  id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                <a href="{{'/'}}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="{{url('/kamar')}}" class="nav-link scrollto">Pilih Kamar</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#popular" class="nav-link">Populer</a>
                </li>
                <li class="nav-item mx-md-2">
                    <a href="#testimonialContent" class="nav-link">Testimonial</a>
                </li>
            </ul>
                
                
            

              @guest
                   <!-- Mobile Button-->
               <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0" type="button"
                    onclick="event.preventDefault(); location.href= '{{ url ('login')}}';" >
                        Masuk
                    </button>
                </form>
                
                <!-- Desktop Button-->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block ">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                        onclick="event.preventDefault(); location.href= '{{ url ('login')}}';">
                       Masuk
                        </button>
                </form>
              @endguest

              @auth
                  <!-- Mobile Button-->
                  <ul class="navbar-nav ml-12 mr-3">
                    <li class="nav-item dropdown" style="color: #fff;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Halo, {{ Auth::user()->name }}! <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href=" {{url('profil')}}" class="dropdown-item" > Profil</a>
                        <a href="{{ url ('editprofil')}}" class="dropdown-item">Edit Profil</a>
                        <a href="{{ route ('history-order')}}" class="dropdown-item">Transaksi Saya</a>
                            
                        </div>
                    </li>
                </ul>
                   
               <form class="form-inline d-sm-block d-md-none" action="{{ url ('logout')}}" method="POST">
                @csrf 
                
                    <button class="btn btn-login my-2 my-sm-0" >
                        Keluar
                    </button>
                </form>
               
                <!-- Desktop Button-->
             
                <form class="form-inline my-2 my-lg-0 d-none d-md-block "action="{{ url ('logout')}}" method="POST">
                    @csrf
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4"> 
                                   Keluar
                        </button>
                </form>
              @endauth

        </div>

    </nav>
</div>