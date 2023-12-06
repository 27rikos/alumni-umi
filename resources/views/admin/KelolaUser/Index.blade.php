@extends('Partials.AdminDashboard')
@section('title','Kelola User')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
            Data User
          </h6>
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
                  <th>Nama</th>
                  <th>NPM</th>
                  <th>Email</th>
                  <th>Aksi</th>
                 
                </tr>
              </thead>
             
              <tbody>
                @foreach ($users as $item)
                    
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->npm }}</td>
                  <td>{{ $item->email }}</td>
                  <td>
                    <form action="{{ route('kelolauser.destroy',$item->id) }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
    
@endsection