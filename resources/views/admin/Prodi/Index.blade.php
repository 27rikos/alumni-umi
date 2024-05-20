@extends('Partials.AdminDashboard')
@section('title', 'Program Studi')
@section('content')

    <div class="main">
        <div class="card shadow mb-4 my-2">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Program Studi
                </h6>
                <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Program Studi</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($prodis as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kd_prodi }}</td>
                                    <td>{{ $item->prodi }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('prodi.edit', $item->id) }}" class="btn btn-primary mx-1"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('prodi.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-regular fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
