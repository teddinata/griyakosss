@extends('layouts.app')

@section('title', 'Pilih Kamar')
   

    
@section('content')
<main>
    <section class="section-room-header"></section>
        <section class="section-details">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    Pilihan Kamar
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            
            
                <section class="section-room-list" id="roomlist">
                    <div class="container" >
                        <div class="section-room-travel row justify-content-center">
                            @foreach ($items as $item)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card-room text-center d-flex flex-column"
                                style="background-image: url('{{ $item->galleries->count() ? Storage::url
                               ($item->galleries->first()->image) : ''}} ') ;">
                                    <div class="room-region">{{$item->location}}</div>
                                    <div class="room-location">{{$item->title}}</div>
                                    <div class="room-button mt-auto">
                                        <a href="{{ url ('detail', $item->slug)}}" class="btn btn-room-details px-4">
                                            View Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                </section>
</section>
</main>
@endsection

   


   

   
        
       
   
    
       
      
 