@extends('Partials.AdminDashboard')
@section('title', 'berita')
@section('content')
    <div class="main">
        <div class="card shadow mb-4 my-2">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Berita
                </h6>
                <a href="{{ route('berita.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
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
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Konten</th>
                                <th>Foto</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td style="text-align: justify">{!! $item->konten !!}</td>
                                    <td><img src="{{ asset('images/berita/' . $item->file) }}" alt=""
                                            style="width:90px;height:100px"></td>
                                    <td class="d-flex">
                                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-primary mr-1"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('berita.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit"><i
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
    </div>

@endsection
