@extends('layouts.admin')

@section ('content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
          <a href="{{ route('userdata.create')}}" class="btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm text-white-50">Tambah Pengguna</i>
        </a>
        </div>
        
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nomor KTP</th>
                                <th>Nomor HP</th>
                                <th>Nomor Kamar</th>
                                <th>Tanggal Masuk</th>
                                <th>Durasi</th>
                                <th>Tagihan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                
                            <tr>
                            <td>{{ $item->id }}</td>
                                <td> {{ $item->name }} </td>
                                <td>{{ $item ->identity_card }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->room_number }}</td>
                                <td>{{ $item->checkin }}</td>
                                <td>{{ $item->duration }}</td>
                                <td>{{ $item->tagihan }}</td>
                                
                                
                                <td>
                                <a href="{{ route ('userdata.edit', $item ->id)}}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                    </a>
    
                                <form action="{{ route ('userdata.destroy', $item ->id)}}" method="POST"
                                        class="d-inline">
                                       @csrf
                                       @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        
        </div>
        <!-- /.container-fluid -->

        @endsection