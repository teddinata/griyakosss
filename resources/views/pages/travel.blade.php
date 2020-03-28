@extends('layouts.app')

@section('title', 'Detail Wisata')
    
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
                                    Pilih Wisata
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
                            <h1>
                                {{ $item ->title}}
                            </h1>
                            <p>
                                {{ $item ->location}}
                            </p>
                            @if($item->travel_galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->travel_galleries->first()->image) }}" class="xzoom"
                                    id="xzoom-default" xoriginal="{{ Storage::url($item->travel_galleries->first()->image) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ( $item->travel_galleries as $travelgallery )
                                    <a href="{{ Storage::url($travelgallery->image)}}">
                                        <img src="{{ Storage::url($travelgallery->image)}}" class="xzoom-gallery" 
                                        width="128" xpreview="{{ Storage::url($travelgallery->image)}}">
                                     </a>
                                        
                                    @endforeach
                                
                                </div>
                             </div>
                            @endif
                            <h2>Tentang Kamar Kos</h2>
                            <p>
                                    {{!! $item->about!!}}
                            <div class="features row">
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                    <img src="{{ url('frontend/images/ic_event.png')}}" 
                                        alt=""
                                        class="features-image"
                                        >
                                       <div class="description">
                                            <h3>Featured Event</h3>
                                            <p>{{$item->featured_event}}</p>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                    <img src="{{url ('frontend/images/ic_language.png')}}" 
                                        alt=""
                                        class="features-image"
                                        >
                                        
                                       <div class="description">
                                            <h3>Language</h3>
                                        <p>{{$item->language}}</p>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="description">
                                    <img src="{{url ('frontend/images/ic_foods.png')}}" 
                                        alt=""
                                        class="features-image"
                                        >    
                                       <div class="description">
                                            <h3>Foods</h3>
                                        <p>{{$item->foods}}</p>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Grab your room now</h2>
                           <div class="members my-2"></div>
                           <label for="doeRoom" id="sr-only">Pilih Tanggal Masuk</label>
                           <div class="input-group mb-2 mr-sm-2">
                               <input type="text" class="form-control datepicker"
                               id="doeRoom" placeholder="Choose your date">
                                </div>
                                <hr>
                                <h2>Trip Information</h2>
                                <table class="trip-information">
                                    <tr>
                                        <th width="50%">Date Of Departure</th>
                                        <td width="50%" class="text-right">
                                            {{\Carbon\Carbon::create($item->departure_date)->format('F n, Y')}}
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <th width="50%">Duration</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->duration }}
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <th width="50%">Type</th>
                                        <td width="50%" class="text-right">
                                            {{ $item->type }}
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <th width="50%">Price</th>
                                        <td width="50%" class="text-right">
                                            Rp {{ $item->price }}.000 / orang
                                        </td>
                                        
                                    </tr>
                                </table>
                            </div>
                            <div class="join-container">
                               @auth
                               <form action="{{ route ('checkoutwisata-process', $item->id)}}" method="POST">
                                @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                        Join Now
                                    </button>
                                </form>
                               @endauth

                               @guest
                                    <a href="{{ url ('/login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                                        Login or Register to Join
                                    </a>
                               @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url ('frontend/libraries/xzoom/xzoom.css')}}">
<link rel="stylesheet" href="{{ url ('frontend/libraries/gijgo/css/gijgo.min.css')}}">    
@endpush

@push('addon-script')
<script src="{{ url ('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
<script src="{{ url ('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
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
            rightIcon: '<img src="{{url ('frontend/images/doe.png') }}"/>'
        }
    });
    });
</script>    
@endpush