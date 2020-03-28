@extends('layouts.admin')

@section ('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Pengguna {{ $item->title }}</h1>
  
</div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="card-shadow">
    <div class="card-body">
       <form action="{{ route('userdata.update', $item->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
        <input type="text" class="form-control" name="name" placeholder="Nama" value=" {{ $item->name }}">
        </div>
        <div class="form-group">
                <label for="identity_card">Nomor KTP</label>
            <input type="number" class="form-control" name="identity_card" placeholder="Nomor KTP" value=" {{$item->identity_card }}">
            </div>
            <div class="form-group">
                    <label for="phone">Nomor HP</label>
                <input type="number" class="form-control" name="phone" placeholder="Nomor HP" value=" {{ $item->phone }}">
                </div>
                <div class="form-group">
                    <label for="nomor_kamar">Nomor Kamar</label>
                    <input type="text" class="form-control" name="room_number" placeholder="Nomor Kamar" value=" {{$item->room_number }}">
                </div>
                <div class="form-group">
                    <label for="checkin">Tanggal CheckIn</label>
                    <input type="date" class="form-control" name="checkin" placeholder="Tanggal Checkin" value=" {{ $item->checkin }}">
                </div>
                <div class="form-group">
                    <label for="duration">Durasi Sewa</label>
                    <input type="text" class="form-control" name="duration" placeholder="Durasi" value=" {{ $item->duration }}">
                </div>
                <div class="form-group">
                    <label for="tagihan">Tagihan</label>
                    <input type="number" class="form-control" name="tagihan" placeholder="Tagihan" value=" {{ $item->tagihan }}">
                </div>
               
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                            
    </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->

@endsection