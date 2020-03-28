@extends('layouts.transaksi')

@section('title', 'Daftar Transaksi')

@section('content')
<main>
    <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    My Transaction
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 pl-lg-0">
                        <div class="card card-details">
                            <h1>My Transaction</h1>
                            <div class="atttendee">
                                <table class="table table-responsive-sm text-center table-hover table-transaction">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            
                                            <td>Kamar / Travel</td>
                                            <td>Total</td>
                                            <td>Status</td>
                                            <td>Metode Pembayaran</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                        <tr>
                                            <td class="align-middle">GK0000{{$item->id}}</td>
                                            <td class="align-middle">{{$item->room_package->title}}</td>
                                            <td class="align-middle">{{$item->room_package->price}}</td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">{{$item->transaction_status}}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bagde-info badge-status-transaction" style="background: rgb(11, 180, 5);color:#ffff;">Alfamart / Indomaret</span>

                                            </td>
                                            <td class="align-middle">
                                            <a href="{{route('history-order.detail', $item->id)}}" class="btn btn-detail-transaction btn-block">Detail Transaction</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Anda Belum Melakukan Transaksi</td>
                                        </tr>
                                        @endforelse
                                        
                                    </tbody>
                                </table>
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



   


   
  

