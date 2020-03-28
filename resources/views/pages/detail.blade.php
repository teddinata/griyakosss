@extends('layouts.app')

@section('title', 'Detail Kos')
    
@section('content')
<main>
    <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Pilih Kamar
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>

                            @if($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->galleries->first()->image)}}" class="xzoom"
                                    id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image)}}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery )
                                        <a href="{{ Storage::url($gallery->image) }}">
                                            <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" 
                                            width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                        </a>
                                    @endforeach
                                </div>
                             </div>
                            @endif
                             
                             <h2>Tentang Kamar Kos</h2>
                            <p>
                                {!! $item->about !!}
                            </p>
                            <div class="features row">

                            @if ($item->facilities->count())
                            <div class="col-md-4 border-left">
                                <div class="description"> 
                                <img src="{{ url ('frontend/images/fasilitas.png')}}" 
                                    alt=""
                                    class="features-image"
                                    >
                                   <div class="description">
                                        <h2>Fasilitas</h2>
                                        @foreach ($item->facilities as $facilities)
                                            <p>{{$facilities->facilities}}</p>
                                        @endforeach
                                        
                                   </div>
                                </div>
                            </div>
                            @endif         
                    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Grab your room now</h2>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                           <div class="members my-2"></div>
                           <form action="{{ route ('checkout_process', $item->id)}}" method="POST">
                            @csrf
                           <label for="doeRoom" id="sr-only">Pilih Tanggal Masuk</label>
                           <div class="input-group mb-2 mr-sm-2">
                               <input type="text" class="form-control datepicker" name="checkInDate"
                               id="doeRoom" placeholder="Choose your date">
                           </div>
                           <div> 
                            
                            <h6>Pilih Durasi Sewa</h6>
                             <label for="durasi" class="sr-only">Pilih Durasi Sewa</label>
                             <select 
                             name="roomTypes" 
                             id="roomTypes" 
                             required class="form-control">
                                 <option roomPrice="0" value="">Pilih Durasi</option>
                                 @foreach ($item->room_types as $room_type)
                                    <option
                                        roomPrice={{ $room_type->price }}
                                        value="{{$room_type->id}}" 
                                        >{{$room_type->durasi}}
                                    </option>
                                 @endforeach
                                
                             </select>
                         </div>
                         
                           
                         
                                <hr>
                                <h6>Room Information</h6>
                                <table class="trip-information">
                                    <tr>
                                        <th width="50%">Kamar Tersedia</th>
                                        <td width="50%" class="text-right" selected>
                                            {{$item->type}} Kamar
                                        </td>
                                        
                                    </tr>
                                 
                                    <tr>
                                        <th width="50%">Harga</th>
                                        <td width="50%" class="text-right" id="totalPrice">
                                            Rp 0
                                        </td>
                                    </tr>   
                                </table>
                        </div>
                          
                       
                        <div class="join-container">
                            @auth
                       
                                <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                    Book Now
                                </button>
                            </form>
                            @endauth
                            @guest
                        <a href="{{route ('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                            Login or Register to Join   
                        </a>
                            @endguest
                    </div>
                    
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
        uiLibrary: 'bootstrap4',
        icons:{
            rightIcon: '<img src="{{url ('frontend/images/doe.png') }}" />'
        }
    });

    $("#roomTypes").change(function(){
        let selectedRoom = $(this).children("option:selected").attr("roomPrice");
        $("#totalPrice").empty();
        $("#totalPrice").html(`Rp ${selectedRoom}`);
    });
});
</script>
@endpush