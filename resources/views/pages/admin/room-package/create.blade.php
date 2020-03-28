@extends('layouts.admin')

@section ('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Data Kamar</h1>
  
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
       <form action="{{ route('room-package.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value=" {{ old ('title') }}">
        </div>
        <div class="form-group">
                <label for="title">Location</label>
            <input type="text" class="form-control" name="location" placeholder="location" value=" {{ old ('location') }}">
            </div>
            <div class="form-group">
                    <label for="title">About</label>
                <input type="text" class="form-control" name="about" placeholder="About" value=" {{ old ('about') }}">
                </div>
                <div class="form-group">
                    <label for="type">Kamar Tersedia</label>
                    <input type="text" class="form-control" name="type" placeholder="Kamar Tersedia" value=" {{ old ('type') }}">
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" name="price" placeholder="Harga" value=" {{ old ('price') }}">
                </div>
               
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            
    </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->

@endsection