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
                                            <td>Kode Transaksi</td>
                                            <td>Kamar / Travel</td>
                                            <td>Total</td>
                                            <td>Payment</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">1</td>
                                            <td class="align-middle">GK111213121</td>
                                            <td class="align-middle">Griya Kos 1</td>
                                            <td class="align-middle">Rp 500.000</td>
                                            <td class="align-middle">
                                                <span class="badge badge-success">Confirmed</span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bagde-info badge-status-transaction" style="background: rgb(11, 180, 5);color:#ffff;">Alfamart / Indomaret</span>

                                            </td>
                                            <td class="align-middle">
                                                <a href="#" class="btn btn-detail-transaction btn-block">Detail Transaction</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">1</td>
                                            <td class="align-middle">GK111213121</td>
                                            <td class="align-middle">Griya Kos 1</td>
                                            <td class="align-middle">Rp 500.000</td>
                                            <td class="align-middle">
                                                <span class="badge badge-warning">Pending</span>
                                            </td>
                                            <td class="align-middle">
                                                <span class="badge bagde-info badge-status-transaction" style="background: rgb(18, 42, 173);color:#ffff;">Transfer Bank</span>

                                            </td>
                                            <td class="align-middle">
                                                <a href="#" class="btn btn-detail-transaction btn-block">Detail Transaction</a>
                                            </td>
                                        </tr>
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



   


   
  

