@extends('layouts.app')

@section('title')
GRIYA KOS
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center" >
        <h1 data-aos="zoom-in"  data-aos-duration="1000" >
            Sekarang Sewa Kos
            <br/>
            Semudah Rebahan
        </h1>
        <p class="mt-3" data-aos="zoom-in" data-aos-duration="1000"> 
                Bayar Kos Jadi Lebih
                <br/>
                Mudah dan Efisien
        </p>

    <a href="{{ route ('login')}}" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header> 

    <main>
        <div class="container" >
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>350</h2>
                    <p>Customers</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>17</h2>
                    <p>Rooms</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>36</h2>
                    <p>Destinations</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>2</h2>
                    <p>Partners</p>
                </div>    
            </section>
        </div>

        <section class="section-popular" id="popular">
        <div class="container"  data-aos="fade-up">
            <div class="row">
                <div class="col text-center 
                section-popular-heading">
                <h2>
                    Pilihan Kamar
                </h2>
                <p>
                    Sinergi hunian yang nyaman
                    <br/>
                    dan lokasi yang strategis
                </p>
                </div>
            </div>
        </div>
        </section>

        <section class="section-room-content" id="room-content">
            <div class="container" data-aos="zoom-in" data-aos-duration="1500">
                <div class="section-room-travel row justify-content-center">
                   @foreach ($items as $item)
                   <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-room text-center d-flex flex-column"
                    style="background-image: url('{{ $item->galleries->count() ? Storage::url
                   ($item->galleries->first()->image) : ''}} ') ;">
                        <div class="room-region">{{$item->location}}</div>
                        <div class="room-location">{{ $item->title}}</div>
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

        <!-- Header Wisata -->

        <section class="section-popular-travel" id="popular-travel">
            <div class="container">
                <div class="row">
                    <div class="col text-center 
                    section-popular-heading-wisata">
                    <h2>
                        Wisata Populer di Cilacap

                    </h2>
                    <p >
                        Something that you never try
                        <br/>
                        before in this world
                    </p>
                    </div>
                </div>
            </div>
            </section>
    
            <section class="section-popular-content" id="popularContent" data-aos="zoom-in-up" data-aos-duration="1500">
                <div class="container" >
                    <div class="section-travel-content row 
                    justify-content-center">
                       @foreach ($details as $detail)
                           
                       
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                            style="background-image: url('{{$detail->travel_galleries->count() ? Storage::url
                            ($detail->travel_galleries->first()->image) :''}}') ;" >
                                <div class="travel-region">{{$detail->location}}</div>
                                <div class="travel-location">{{$detail->title}}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ url ('travel', $detail->slug)}}" class="btn btn-travel-details px-4">
                                        View Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section-testimonial-heading" id="testimonialHeading">
                <div class="container" data-aos="zoom-in-up">
                    <div class="row">
                        <div class="col text-center">
                            <h2>
                                    They Are Loving Us
                            </h2>
                            <p>
                                    Moments were giving them 
                                    <br/>
                                    the best experience
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section section-testimonial-content" id="testimonialContent">
                <div class="container"  data-aos="fade-up" data-aos-duration="2000">
                    <div class="section-testimonial-travel row justify-content-center">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimonial text-center">
                                <div class="testimonial-content" data-aos="fade-up" data-aos-duration="2000">
                                    <img src="frontend/images/testimonial1.png" 
                                    alt="user"
                                    class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Teddi</h3>
                                    <p class="testimonial">
                                        "Kamarnya nyaman dan bersih
                                        Dekat dengan pusat kota
                                        jadi pengen main ke
                                        Cilacap lagi."
                                    </p>
                                </div>
                                <hr>
                                <p class="trip-to mt-2">
                                    Backpacker
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimonial text-center">
                                <div class="testimonial-content" data-aos="fade-up" data-aos-duration="2000">
                                    <img src="frontend/images/testimonial2.png" 
                                    alt="user"
                                    class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Julian</h3>
                                    <p class="testimonial">
                                        "Pilihan tepat nginep lowbudget
                                        tp nyaman di Griya Kos."
                                    </p>
                                </div>
                                <hr>
                                <p class="trip-to mt-2">
                                    Backpacker
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimonial text-center">
                                <div class="testimonial-content">
                                    <img src="frontend/images/testimonial3.png" 
                                    alt="user"
                                    class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Angga</h3>
                                    <p class="testimonial">
                                        "Pelayanannya bagus dan
                                        Fast response. Perjalanan
                                        Kerja saya jadi mudah tidak
                                        perlu muter2 cari 
                                        hotel."
                                    </p>
                                </div>
                                <hr>
                                <p class="trip-to mt-2">
                                    Backpacker
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center" data-aos="fade-up">
                                <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                                    I Need Help
                                </a>
                            <a href="{{ route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                                   Get Started
                                </a>
                            </div>
                        </div>
                    </div>
            </section>
          

    </main>
@endsection