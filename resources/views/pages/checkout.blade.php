@extends('layouts.checkout')

@section('title', 'Checkout Kos')

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
                                <li class="breadcrumb-item">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout Kos
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <h1>Konfirmasi Pembayaran</h1>
                        <p>
                            Book to {{ $item->room_package->title}}, 
                            {{ $item->room_package->location}}
                        </p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Nama</td>
                                            <td>Nationality</td>
                                            <td>Pekerjaan</td>
                                            <td>Checkin</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                        <tr>
                                                <td>
                                                    <img src="https://ui-avatars.com/api/?name={{$detail->username}}"
                                                    height="60" class="rounded-circle" name="avatar"/>
                                                </td>
                                                <td class="align-middle">
                                                    {{$detail->username}}
                                                </td>
                                                <td class="align-middle">
                                                        {{$detail->nationality}}
                                                </td>
                                                <td class="align-middle">
                                                       {{$detail->job}}
                                                    </td>
                                                <td class="align-middle">
                                                       {{ \Carbon\Carbon::createFromDate($detail->checkin) >
                                                       \Carbon\Carbon::now()? 'Tanggal Valid'  : 'Tanggal tidak valid'}}
                                                </td>
                                                <td class="align-middle">
                                                <a href="{{ route ('checkout-remove', $detail->id)}}">
                                                        <img src="{{ url ('frontend/images/ic_remove.png')}}" alt="">
                                                    </a>
                                                    </td>    
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center"> 
                                                    Tidak ada Member
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form  class="form-inline" method="POST" action="{{ route('checkout-create',
                                        $item->id)}}">
                                        @csrf
                                        <label for="inputName" class="sr-only">name</label>
                                        <select 
                                        name="inputName" 
                                        id="inputName" 
                                        class="custom-select mb-2 mr-sm-2 ">
                                            <option value="Tuan">Tuan</option>
                                            <option value="Nyonya">Nyonya</option>
                                            <option value="Nona">Nona</option>
                                        </select>

                                        <label for="username" class="sr-only">Nama</label>
                                        <input type="text" 
                                        name="username"
                                        class="form-control mb-2 mr-sm-2"
                                        id="username" 
                                        placeholder="Username"
                                        />

                                        <label for="nationality" class="sr-only">Nationality</label>
                                        <input
                                            type="text"
                                            name="nationality"
                                            class="form-control mb-2 mr-sm-2"
                                            style="width: 50px;"
                                            id="nationality"
                                            placeholder="Nationality"
                                        />

                                        <label for="job" class="sr-only">Job</label>
                                        <input
                                            type="text"
                                            name="job"
                                            class="form-control mb-2 mr-sm-2"
                                            
                                            id="job"
                                            placeholder="Job"
                                        />

                                        <label for="checkin" class="sr-only"
                                        >Checkin</label>
                                        <div class="input-group mb-2 mr-sm-2">
                                        <input
                                            type="text"
                                            name="checkin"
                                            class="form-control datepicker"
                                            id="checkin"
                                            placeholder="Checkin"
                                        />
                                        </div>

                                      <button type="submit" class="btn btn-add-now mb-2 px-4">
                                        Add Now
                                      </button>

                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                       Hanya bisa mengundang member yang sudah terdaftar di GriyaKos.
                                </p>
                                <p class="disclaimer mb-0">
                                    1 Kamar bisa diisi 2 orang, jika mau dipakai 2 orang, cukup isi 1 data member.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-information">
                                    <tr>
                                        <th width="50%">Member</th>
                                        <td width="50%" class="text-right">
                                        {{ $item->details->count() }} person
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <th width="50%">Price Room</th>
                                        <td width="50%" class="text-right">
                                            Rp {{$item->room_package->price}} / Kamar
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                            <th width="50%">Total</th>
                                            <td width="50%" class="text-right">
                                                Rp {{$item->transaction_total }} / Kamar
                                            </td>
                                            
                                        </tr>
                                    <tr>
                                        <th width="50%">Total (+Unique)</th>
                                        <td width="50%" class="text-right text-total">
                                        <span class="text-blue">Rp {{$item->transaction_total}}+</span>
                                        <span class="text-orange">{{mt_rand(0,999)}}</span>
                                        </td>
                                    </tr>
                                </table>

                                <hr/>
                                <h2>Payment Instruction</h2>
                                <p class="payment-instructions">
                                        Transfer sesuai ditambah dengan kode unik agar 
                                        dapat terverifikasi kurang dari 3 menit.
                                </p>
                                <div class="bank">
                                    <div class="bank-item pb-3">
                                        <img src="{{ url ('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                        <div class="description">
                                            <h3>Teddinata Kusuma</h3>
                                            <p>
                                                90 000 393 05876
                                            </p>
                                            <p>
                                                    Bank Mandiri
                                            </p>
                                            
                                        </div>
                                        <div class="clearfix">

                                        </div>
                                        <div class="bank-item pb-3">
                                                <img src="{{url ('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                                <div class="description">
                                                    <h3>Teddinata Kusuma</h3>
                                                    <p>
                                                       90 20000 7042 / $teddinata
                                                    </p>
                                                    <p>
                                                            Jenius
                                                    </p>
                                                </div>
                                            <div class="clearfix"> 
                                        </div>
                                    </div>
                                </div>
                        </div>  
                    </div>
                          
                       
                        <div class="join-container">
                                <a href="{{ route ('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    I Have Made Payment
                                </a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route ('detail', $item->room_package->slug)}}" class="text-muted">
                                    Cancel Booking
                                </a>
                            </div>
                    </div>
                </div>
            </div>

            
    </section>
</main>
@endsection

@push('prepend-style')
  <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
@endpush

@push('addon-script')
  <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        icons: {
          rightIcon: '<img src="{{ url('frontend/images/doe.png') }}" />'
        }
      });
    });
  </script>
@endpush
