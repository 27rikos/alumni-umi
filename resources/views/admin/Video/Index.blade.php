@extends('Partials.AdminDashboard')
@section('title', 'Video')

@section('content')

    <div class="main">
        <div class="card shadow mb-4 my-2">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Video
                </h6>
                <a href="{{ route('Video.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
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
                                <th>Judul Video</th>
                                <th>Link Video</th>
                                <th>Foto</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($videos as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td><a href="{{ $item->link }}">{{ $item->link }}</a></td>
                                    <td><img src="{{ asset('images/thumbnail/' . $item->file) }}"
                                            style="width:80px;height:100px" srcset=""></td>
                                    <td class="d-flex">
                                        <a href="{{ route('Video.edit', $item->id) }}" class="btn btn-primary mx-1"><i
                                                class="fa-regular fa-pen-to-square"></i></a>

                                        <form action="{{ route('Video.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class=" btn btn-danger" type="submit"><i
                                                    class="fa-regular fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
