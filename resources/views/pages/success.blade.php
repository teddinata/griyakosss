@extends('layouts.success')

@section('title', 'Checkout Success')
    
@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url ('frontend/images/ic_mail.png') }}" alt=""/>
            
            <h1>Yay! Your Transaction is Success!</h1>
            <p>
                    We’ve sent you email for trip confirmation and instruction 
                    <br/>
                    please read it as well.
            </P>
            <p>
                Anda akan menerima email yang berisi konfirmasi dan instruksi selanjutnya.
                <br>
                Estimasi Proses Konfirmasi Pembayaran 3 menit setelah pembayaran,
                <br>
                Jika lebih dari 3 menit, belum terkonfirmasi mohon hubungi CS Griya Kos.
            </p>
            <a href="{{ url ('/')}}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection