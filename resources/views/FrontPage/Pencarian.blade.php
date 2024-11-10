@extends('Partials.Frontpage')
@section('title', 'Pencarian')
@section('content')
    <section class="pt-3">
        <div class="cari container text-center">
            <div class="alert alert-info mt-5" role="alert">
                Silahkan Masukkan <strong>Nama/NPM/Stambuk</strong> Sebagai Kata Kunci
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <form class="form-inline d-sm-inline-flex flex-column flex-sm-row" role="search" method="GET"
                    action="/pencarian/data">
                    <div class="input-group">
                        <input type="search" class="form-control rounded mr-1" name="cari" type="search"
                            placeholder="Cari alumni" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" value="{{ request('cari') }}" />
                        <button type="submit" class="btn btn-outline-info"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container mt-5 mb-4">
            <div class="row">
                @forelse ($datas as $item)
                    <div class="col-12 col-xs-6 col-sm-6 col-lg-3 mb-3">
                        <div class="d-flex justify-content-center">
                            <div class="card mb-3 text-center shadow" style="width: 18rem; height: 27rem;">
                                <div class="card-header">
                                    <h6>{{ $item->npm }}</h6>
                                    <h6>{{ $item->stambuk }}</h6>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset('images/alumni/' . $item->file) }}" alt=".." id="profile"
                                        class="rounded-circle" style="width: 200px; height: 200px; object-fit:cover;">
                                    <div class="mt-3">
                                        <h5>{{ $item->nama }}</h5>
                                        <div class="card-footer">
                                            <small>
                                                {{ $item->prodis->prodi }} <br>
                                                {{ $item->minat->peminatan }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info mt-5 text-center" role="alert">
                        Data Belum Tersedia
                    </div>
                @endforelse
            </div>
            {{ $datas->links('pagination::bootstrap-4') }}
        </div>
    </section>

@endsection
