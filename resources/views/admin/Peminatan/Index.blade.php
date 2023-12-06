@extends('Partials.AdminDashboard')
@section('title','Peminatan')
 
@section('content')

<div class="container">
    <div class="card shadow mb-4 my-2">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
              Peminatan
            </h6>
          <a href="{{ route('peminatan.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
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
                  <th>Kode Peminatan</th>
                  <th>Peminatan</th>
                  <th>Aksi</th>
                 
                </tr>
              </thead>
             
              <tbody>
                @foreach ($peminatan as $item)
                    
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->kd_peminatan }}</td>
                  <td>{{ $item->peminatan }}</td>
                  <td class="d-flex">
                    <a href="{{ route('peminatan.edit',$item->id) }}" class="btn btn-primary mx-1"><i class="fa-regular fa-pen-to-square"></i></a>

                    <form action="{{ route('peminatan.destroy',$item->id) }}" method="post">
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