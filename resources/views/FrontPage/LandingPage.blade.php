@extends('Partials.Frontpage')
@section('title', 'Home')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div data-aos="zoom-in">
                <h1>Welcome to Alumni UMI</h1>
            </div>
            <div data-aos="fade-up" data-aos-duration="1000">
                <p>
                    Connect with your fellow alumni and stay updated with campus news.
                </p>
            </div>
            <div data-aos="fade-up" data-aos-duration="1500">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill">Get Started</a>
            </div>
        </div>
    </section>
    <section class="pt-5">
        <div class="container">
            <h1 class="text-center mb-1">Jumlah Alumni</h1>
            <div class="row">
                <div class="four col-md-3 mb-3">
                    <div class="counter-box "> <i class="fa-solid fa-user-graduate"></i> <span class="counter">2147</span>
                        <p>Falkutas kedokteran</p>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div class="counter-box"> <i class="fa-solid fa-user-graduate"></i> <span class="counter">3275</span>
                        <p>Falkutas Ekonomi</p>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div class="counter-box"> <i class="fa-solid fa-user-graduate"></i> <span class="counter">289</span>
                        <p>Falkutas Ilmu Komputer</p>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div class="counter-box"> <i class="fa-solid fa-user-graduate"></i> <span class="counter">1563</span>
                        <p>Falkutas Sastra</p>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div class="counter-box"> <i class="fa-solid fa-user-graduate"></i> <span class="counter">5000</span>
                        <p>Falkutas Pertanian</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Latest News</h2>
            <hr>
            <div class="row">
                @forelse ($datas as $item)
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('images/berita/' . $item->file) }}" class="img-fluid mb-3 object-fit-cover"
                            alt="News 1" />
                        <h5 class="news-title">{{ $item->judul }}</h5>
                        @php
                            $dateString = $item->tanggal;
                            $news = strftime('%d %B %Y', strtotime($dateString));
                        @endphp
                        <p class="news-date text-muted">{{ $news }}</p>
                        <p class="news-description">
                            {{ Str::limit(Strip_tags($item['konten']), 30, '...') }}
                        </p>
                        <a href="/read/{{ $item->id }}" class="btn btn-primary">Read More</a>
                    </div>
                @empty
                    <div class="alert alert-primary text-center" role="alert">
                        Berita Belum Di update
                    </div>
                @endforelse
            </div>
            <a href="{{ route('old-news') }}" class="d-flex justify-content-end">Lihat Semua Berita..</a>
        </div>
    </section>
    <style>
        .container {
            margin-top: 100px
        }

        .counter-box {
            display: block;
            padding: 40px 20px 37px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .counter-box p {
            margin: 5px 0 0;
            padding: 0;
            color: #909090;
            font-size: 18px;
            font-weight: 500;
        }

        .counter-box i {
            font-size: 60px;
            margin: 0 0 15px;
            color: #d2d2d2;
        }

        .counter {
            display: block;
            font-size: 32px;
            font-weight: 700;
            color: #666;
            line-height: 28px;
        }

        .counter-box.colored {
            background: #3acf87;
        }

        .counter-box.colored p,
        .counter-box.colored i,
        .counter-box.colored .counter {
            color: #fff;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var counters = document.querySelectorAll('.counter');
            counters.forEach(function(counter) {
                var updateCount = function() {
                    var target = +counter.innerText;
                    var count = 0;
                    var increment = target / 200;

                    var animate = function() {
                        count += increment;
                        if (count < target) {
                            counter.innerText = Math.ceil(count);
                            requestAnimationFrame(animate);
                        } else {
                            counter.innerText = target;
                        }
                    };

                    animate();
                };

                updateCount();
            });
        });
    </script>
@endsection
