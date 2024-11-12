@extends('Partials.Frontpage')
@section('title', 'Pencarian')
@section('content')
    <section class="min-vh-100 pt-5">
        <div class="jumbotron jumbotron-fluid"
            style="background: linear-gradient(135deg, #4a90e2, #0052cc); color: white; padding: 50px 0;">
            <div class="container">
                <h1 class="display-4 font-weight-bold" style="font-size: 3rem;">Pencarian Data Alumni</h1>
                <p class="lead">Telusuri informasi alumni dan temukan profil para lulusan kami yang berprestasi.</p>
                <nav aria-label="breadcrumb" class="d-flex mt-4">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ route('main') }}" class="text-light">Home</a></li>
                        <li class="breadcrumb-item " aria-current="page" class="text-light">Data Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="cari container text-center">
            <div class="alert alert-primary mt-5" role="alert">
                Silahkan Masukkan <strong>Nama/NPM/Stambuk</strong> Sebagai Kata Kunci Pencarian
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <form class="form-inline d-sm-inline-flex flex-column flex-sm-row" role="search" method="GET"
                    action="/pencarian/data">
                    <div class="input-group">
                        <input type="search" class="form-control rounded mr-1" name="cari" type="search"
                            placeholder="Cari alumni" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" value="{{ request('cari') }}" />
                        <button type="submit" class="btn btn-outline-primary"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container mt-5 mb-4">
            <div class="row">
                @forelse ($datas as $item)
                    <div class="col-12 col-xs-6 col-sm-6 col-lg-3 mb-4">
                        <div data-aos="fade-up">
                            <div class="d-flex justify-content-center">
                                <div class="card shadow border-0"
                                    style="width: 300px; height: 450px; border-radius: 15px; overflow: hidden;">

                                    <!-- Header -->
                                    <div class="card-header text-white text-center"
                                        style="background: linear-gradient(135deg, #4a90e2, #0052cc); padding: 15px;">
                                        <h6 class="mb-1">{{ $item->npm }}</h6>
                                        <small>{{ $item->stambuk }}</small>
                                    </div>

                                    <!-- Body -->
                                    <div class="card-body text-center">
                                        <img src="{{ asset('images/alumni/' . $item->file) }}" alt="Profile"
                                            class="rounded-circle shadow" loading="lazy"
                                            style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #f8f9fa;">
                                        <div class="mt-3">
                                            <h5 class="font-weight-semibold">{{ $item->nama }}</h5>
                                            <p class="text-muted mb-1" style="font-size: 14px;">
                                                {{ $item->prodis->prodi }}
                                            </p>
                                            <span class="badge  text-white"
                                                style="background: linear-gradient(135deg, #4a90e2, #0052cc);">{{ $item->minat->peminatan }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary mt-5 text-center w-100" role="alert">
                        Data Belum Tersedia
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{ $datas->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
