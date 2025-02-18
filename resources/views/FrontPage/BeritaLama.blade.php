@extends('Partials.Frontpage')
@section('title', 'Berita Terkait')
@section('content')
    <section class="py-5 min-vh-100">
        <div class="container">
            <!-- Search and Filter -->
            <div class="search-box">
                <form action="{{ route('old-news') }}" method="GET">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-6 col-md-12">
                            <input type="text" name="search" class="form-control" placeholder="Cari berita..."
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-lg-4 col-md-8">
                            <select class="form-select" name="category">
                                <option value="">Kategori Berita</option>
                                @foreach ($kategori as $item)
                                    <option
                                        value="{{ $item->id }}"{{ request('category') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4">
                            <button type="submit" class="btn btn-primary-custom w-100">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                <div class="category-filter mt-4">
                    <div class="category-scroll">
                        <span class="category-badge {{ request('category') == '' ? 'active' : '' }}">Semua</span>
                        @foreach ($kategori as $item)
                            <span
                                class="category-badge {{ request('category') == $item->id ? 'active' : '' }}">{{ $item->nama }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- News List -->
            <div class="row">
                <!-- News Item -->
                @forelse ($datas as $item)
                    <div class="col-12">
                        <div class="card news-list-card">
                            <div class="row g-0">
                                <div class="col-md-4 news-image-container">
                                    <img src="{{ asset('images/berita/' . $item->file) }}" class="news-image"
                                        alt="News Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="category-tags">
                                            <span class="news-category">{{ $item->kategori->nama }}</span>
                                            <!-- Tambahkan kategori lain jika ada -->
                                        </div>
                                        <h4 class="card-title mb-2">{{ $item->judul }}</h4>
                                        <p class="news-date mb-3">Dipublikasikan: {{ $item->created_at->diffForHumans() }}
                                        </p>
                                        <p class="card-text">{{ Str::limit(Strip_tags($item['konten']), 100, '.....') }}
                                        </p>
                                        <a href="/read/{{ $item->id }}" class="btn btn-primary-custom">Baca
                                            Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="justify-content-center">
                {{ $datas->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection

@push('script-css')
    <style>
        .news-list-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .news-list-card:hover {
            transform: translateY(-5px);
        }

        .news-image-container {
            height: 300px;
            overflow: hidden;
            position: relative;
        }

        .news-image {
            width: 400px;
            height: 300px;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .news-list-card:hover .news-image {
            transform: scale(1.05);
        }

        .category-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 10px;
        }

        .news-category {
            background-color: rgba(255, 107, 107, 0.9);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .news-category:hover {
            background-color: #FF5252;
            transform: translateY(-2px);
        }

        .news-date {
            color: #6c757d;
            font-size: 14px;
        }

        .btn-primary-custom {
            background-color: #FF6B6B;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px 20px;
        }

        .btn-primary-custom:hover {
            background-color: #FF5252;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .search-box {
            border-radius: 15px;
            padding: 20px;
            background: #f8f9fa;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .category-filter {
            margin-bottom: 20px;
            overflow: hidden;
        }

        .category-scroll {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding: 5px 0;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .category-scroll::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .category-badge {
            cursor: pointer;
            margin: 5px;
            padding: 8px 15px;
            border-radius: 20px;
            background-color: #e9ecef;
            transition: all 0.3s ease;
            white-space: nowrap;
            user-select: none;
        }

        .category-badge:hover,
        .category-badge.active {
            background-color: #FF6B6B;
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .news-image-container {
                height: 200px;
            }

            .news-image {
                width: 100%;
                height: 200px;
            }

            .card-body {
                padding: 1rem;
            }

            .card-title {
                font-size: 1.1rem;
            }

            .search-box {
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            .category-badge {
                padding: 6px 12px;
                font-size: 13px;
            }

            .news-category {
                padding: 4px 12px;
                font-size: 12px;
            }
        }
    </style>
@endpush
