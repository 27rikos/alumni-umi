@extends('Partials.Frontpage')
@section('title', 'Home')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content" style="text-align: left; margin-left: auto;">
                <div data-aos="zoom-in">
                    <h1>SIKAK UMI</h1>
                </div>
                <div data-aos="fade-up" data-aos-duration="1000">
                    <p>
                        A comprehensive platform to manage academic and student activities at UMI. Stay connected with your
                        academic progress, access important course information, and make the most of student services.
                    </p>
                    <p>
                        Join us in enhancing the academic and student experience at UMI through SIKAK.
                    </p>
                </div>
                <div data-aos="fade-up" data-aos-duration="1500">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </section>


    <section class="pt-5">
        <div class="container">
            <h1 class="mb-1">Jumlah Alumni</h1>
            <hr>
            <div class="row">
                <div class="four col-md-3 mb-3">
                    <div data-aos="fade-up">
                        <div class="counter-box faculty-fk"> <i class="fa-solid fa-user-doctor"></i> <span
                                class="counter">{{ $fk }}</span>
                            <p>Falkutas Kedokteran</p>
                        </div>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div data-aos="fade-up">
                        <div class="counter-box faculty-fe"> <i class="fa-solid fa-coins"></i> <span
                                class="counter">{{ $fe }}</span>
                            <p>Falkutas Ekonomi</p>
                        </div>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div data-aos="fade-up">
                        <div class="counter-box faculty-fikom"> <i class="fa-solid fa-computer"></i> <span
                                class="counter">{{ $fikom }}</span>
                            <p>Falkutas Ilmu Komputer</p>
                        </div>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div data-aos="fade-up">
                        <div class="counter-box faculty-fs"> <i class="fa-solid fa-book-open-reader"></i> <span
                                class="counter">{{ $fs }}</span>
                            <p>Falkutas Sastra</p>
                        </div>
                    </div>
                </div>
                <div class="four col-md-3 mb-3">
                    <div data-aos="fade-up">
                        <div class="counter-box faculty-fp"> <i class="fa-solid fa-wheat-awn"></i> <span
                                class="counter">{{ $fp }}</span>
                            <p>Falkutas Pertanian</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="news py-5 bg-light">
        <div class="container">
            <h2>Berita Terbaru</h2>
            <hr>
            <div class="row">
                @forelse ($datas as $item)
                    <div class="col-md-4 mb-3">
                        <div data-aos="fade-up">
                            <img src="{{ asset('images/berita/' . $item->file) }}" class="img-fluid mb-3 object-fit-cover"
                                loading="lazy" style="height: 200px; width:100%" alt="News {{ $item->id }}" />
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
                    </div>
                @empty
                    <div class="alert alert-primary text-center w-100" role="alert">
                        Berita Belum Di update
                    </div>
                @endforelse
            </div>
            <a href="{{ route('old-news') }}" class="d-flex justify-content-end">Lihat Semua Berita..</a>
        </div>
    </section>
    <section id="partner-logos" class="py-5">
        <div class="container">
            <h2 class="mb-4">Partner Kerja Sama</h2>
            <hr>
            <div id="logoCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @if ($partner->isEmpty())
                        <div class="alert alert-primary text-center w-100" role="alert">
                            Data Belum Tersedia
                        </div>
                    @else
                        @foreach ($partner->chunk(3) as $chunkIndex => $chunk)
                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-around">
                                    @foreach ($chunk as $item)
                                        <img src="{{ asset('images/logo_instansi/' . $item->foto) }}"
                                            alt="{{ $item->instansi }}" class="img-fluid"
                                            alt="Logo {{ $loop->iteration }}" style="max-height: 100px;">
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <a class="carousel-control-prev" href="#logoCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#logoCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

@endsection
@push('script-css')
    <style>
        .counter-box {
            display: grid;
            place-items: center;
            height: 200px;
            padding: 0 20px;
            text-align: center;
            border-radius: 10px;
            background: #f8f8f8;
            /* Default background color */
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

        /* Custom colors for each faculty box */
        .counter-box.faculty-fk {
            background: #e8f4f8;
            /* Light blue */
        }

        .counter-box.faculty-fe {
            background: #f9f3e4;
            /* Light yellow */
        }

        .counter-box.faculty-fikom {
            background: #e9f4e8;
            /* Light green */
        }

        .counter-box.faculty-fs {
            background: #f4e9f6;
            /* Light purple */
        }

        .counter-box.faculty-fp {
            background: #f6f0e9;
            /* Light beige */
        }

        /* Optional: Style text and icons in white if needed for contrast */
        .counter-box.faculty-fk p,
        .counter-box.faculty-fk i,
        .counter-box.faculty-fk .counter {
            color: #333;
        }

        .counter-box.faculty-fe p,
        .counter-box.faculty-fe i,
        .counter-box.faculty-fe .counter {
            color: #333;
        }

        .counter-box.faculty-fikom p,
        .counter-box.faculty-fikom i,
        .counter-box.faculty-fikom .counter {
            color: #333;
        }

        .counter-box.faculty-fs p,
        .counter-box.faculty-fs i,
        .counter-box.faculty-fs .counter {
            color: #333;
        }

        .counter-box.faculty-fp p,
        .counter-box.faculty-fp i,
        .counter-box.faculty-fp .counter {
            color: #333;
        }

        #partner-logos img {
            max-height: 100px;
            object-fit: contain;
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

        $(document).ready(function() {
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
@endpush
