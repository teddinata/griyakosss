@extends('layouts.app')

@section('title')
    Edit Profil
@endsection

@section('content')
<main>
    <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item ">
                                    Profil Saya
                                </li>
                                <li class="breadcrumb-item active">
                                    Edit Profil
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                         
                        <form action="{{route('editprofil.update', $item->id)}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @if (session('berhasil'))
                                <div class="alert alert-success" role="alert">
                                    Data berhasil diubah!
                               </div>
                            @endif
                           
                            <h1> Edit Profil Saya</h1>
                            <div class="col-12 text-center">
                                <img src="{{asset('images/'.$item->avatar)}}" 
                                style="object-fit:cover;border:2px solid #E3E3E3;" 
                                alt class="rounded-circle" height="250" width="250">
                            </div>
                            <h2 class="text-center">Foto Profil</h2>
                            <div class="form-group mt-3">
                            <input type="file" class="form-control" name="avatar">
                            </div>
                            <div class="member mt-3">
                            
                               <!-- <input type="hidden" name="_token" value="" >
                                <input type="hidden" name="_method" value="PUT"> -->
                                   <div class="form-group">
                                       <label for="username">Username</label>
                                       <input type="text" class="form-control" name="username" id="username" 
                                   value="{{$item->username}}" >
                                   </div>
                                   <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" id="name" 
                                   value="{{$item->name}}" >
                                    <div class="form-group">
                                        <label for="email">E-Mail</label>
                                        <input type="text" class="form-control" name="email" id="email" 
                                        value="{{$item->email}}" >
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone">Nomor Hp</label>
                                        <input type="text" class="form-control" name="phone" id="phone" 
                                        value="{{$item->phone}}" >
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="birth">Tanggal Lahir</label>
                                        <input type="text" class="form-control datepicker"
                                        id="birth" placeholder="Tanggal Lahir" value data-type="{{$item->birth}}">
                                    
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="Laki-laki" @if ($item->gender == 'Laki-laki') selected @endif>Laki-laki</option>
                                        <option value="Perempuan" @if ($item->gender == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-12 text-center">
                                    
                                        <button type="submit" class="btn btn-logout px-2 mt-4 mx-1" onclick="return confirm('Yakin untuk mengubah data?')">
                                            Simpan Perubahan
                                        </button>
                                
                                    <a href="{{('/profil')}}" class="btn btn-cancel  px-2 mt-4 mx-1 ">Cancel</a>
                                  
                                </div>  
                                </div>
                                
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                             
                <div class="col-lg-4">
                    <div class="card card-details card-right">
                        <h2 class="text-center">Menu</h2>
                        <hr>
                        <div class="text-center mt-3">
                            <a href="#" class="edit-profil">
                                Profil Saya
                            </a>
                            </div>
                        <div class="text-center mt-3">
                            <a href="#" class="edit-profil">
                                Edit Profil
                            </a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="listtransaction.html" class="mytransaction">
                                    Transaksi Saya
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="#" class="room">
                                    Pilih Kamar
                                </a>
                            </div>
                            <div class="text-center mt-3 active">
                                <a href="#" class="travel">
                                    Pilih Paket Travel
                                </a>
                            </div>
                            </div>
                           
                            <div class="join-container">
                                <a href="" class="btn btn-block btn-join-now mt-3 py-2">Logout</a>
                            </div>
                    </div>
                </div>
           
           
           
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url ('frontend/libraries/xzoom/xzoom.css')}}"/>
<link rel="stylesheet" href="{{ url ('frontend/libraries/gijgo/css/gijgo.min.css')}}"/>
@endpush


@push('addon-script')
<script src="{{ url ('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
<script src="{{ url ('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom ({
            zoomwidth: 500,
            title: false,
            tint: '#333',
            xoffset: 15,
        });
      
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4',
        icons:{
            rightIcon: '<img src="{{url ('frontend/images/doe.png') }}" />'
        }
    });
});
</script>
@endpush