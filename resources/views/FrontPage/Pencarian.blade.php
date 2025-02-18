@extends('Partials.Frontpage')
@section('title', 'Pencarian')
@section('content')
    <section>
        <div class="container py-4 min-vh-100">
            <!-- Search Container -->
            <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
                <!-- Search Form -->
                <form action="{{ route('pencarian') }}" method="get">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control bg-light border-start-0"
                                    placeholder="Cari berdasarkan nama atau NPM...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select bg-light" name="prodi">
                                <option value="">Program Studi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}"
                                        {{ request('prodi') == $item->id ? 'selected' : '' }}>
                                        {{ $item->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100" type="submit">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Alumni Cards -->
            <div class="row g-4 mb-5">
                @forelse ($datas as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="{{ asset('images/alumni/' . $item->file) }}" width="400" height="400"
                                class="object-fit-cover" alt="Alumni" class="card-img-top">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="card-title">{{ $item->nama }}</h5>
                                        <p class="card-text text-muted mb-0">{{ $item->prodis->prodi }}</p>
                                        <small class="text-muted">{{ $item->fakultas }}</small>
                                    </div>
                                    <span class="badge bg-primary rounded-pill px-3">2021</span>
                                </div>
                            </div>
                            <div class="card-footer bg-light border-0">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <div class="fw-bold">{{ $item->npm }}</div>
                                        <small class="text-muted">NPM</small>
                                    </div>
                                    <div class="col-6">
                                        <div class="fw-bold">{{ $item->thn_lulus }}</div>
                                        <small class="text-muted">Lulus</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <!-- Pagination -->
                <div class="justify-content-center">
                    {{ $datas->links('pagination::bootstrap-5') }}
                </div>
            </div>
    </section>
@endsection

@push('script-css')
    <style>
        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .input-group-text {
            border-right: 0;
        }

        .form-control:focus {
            border-color: #dee2e6;
            box-shadow: none;
        }
    </style>
@endpush
