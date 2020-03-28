@extends('layouts.admin')

@section ('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
  
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
       <form action="{{ route('facilities.update', $item->id)  }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
                <label for="room_packages_id">Data Kamar</label>
                <select name="room_packages_id" required class="form-control">
                    <option value="{{ $item->room_packages_id }}">Jangan Diubah</option>
                    @foreach ($room_packages as $room_package)
                        <option value="{{ $room_package->id}}">
                        {{ $room_package->title}}
                    </option>
                        
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="facilities">Fasilitas</label>
                <input type="text" class="form-control" name="facilities" placeholder="Fasilitas" class="form-control" value=" {{ $item->facilities }}">
            </div>
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                            
    </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->

@endsection