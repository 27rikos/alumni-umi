@extends('Partials.AdminDashboard')
@section('title','Gallery')
 
@section('content')

<div class="container">
    <div class="card shadow mb-4 my-2">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
              Gallery
            </h6>
          <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
              <span class="icon text-white-50">
                  <i class="fa-solid fa-plus"></i>
              </span>
              <span class="text">Tambah</span>
          </a>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Keterangan</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                 
                </tr>
              </thead>
             
              <tbody>
                @foreach ($foto as $item)
                    
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->keterangan }}</td>
                  <td><img src="{{ asset('storage/gallery/'.$item->file) }}" style="width:80px;height:100px" srcset=""></td>
                  <td class="d-flex">
                    <a href="{{ route('gallery.edit',$item->id) }}" class="btn btn-primary mx-1"><i class="fa-regular fa-pen-to-square"></i></a>

                    <form action="{{ route('gallery.destroy',$item->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class=" btn btn-danger" type="submit"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              
               
              </tbody>
            </table>
          </div>
        </div>
@endsection