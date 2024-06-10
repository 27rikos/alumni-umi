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
    <!-- Welcome Message Section -->
    <section class="welcome-message py-5">
        <div class="container">
            <h2 class="text-center">Kata Sambutan</h2>
            <hr>
            <p class="teks">
                SHALOM Sahabat Alumni Fikom UMI yang diberkati Tuhan, <br>
                Alumni Fakultas Ilmu Komputer Universitas Methodist Indonesia yang tangguh,hebat dan kuat.
                Alumni yang perduli almamaternya Kita patut mengucapkan syukur atas segala berkat yang Tuhan
                sudah berikan kepada kita para tamatan Fakultas Ilmu Komputer Universitas Methodist Indonesia
                sehingga kita semua, hingga saat ini tetap bersatu dalam roh pelayanan, saling mendukung,
                saling menginspirasi dan saling memotivasi melalui organisasi perkumpulan yang kita cintai
                bersama yaitu Ikatan Alumni Fakultas Ilmu Komputer Universitas Methodist
                Indonesia(INIFIKOM-UMI).<br>
                Melalui INIFIKOM-UMI:
            <div class="teks">
                <ol>
                    <li>kita bisa memberikan kontribusi yang terbaik sesuai dengan kemampuan kita
                        masing-masing, untuk kebaikan dan kemajuan para alumni, almamater dan bangsa kita.</li>
                    <li>Wewujudkan bersama tercapainya <strong> VISI INIFIKOM-UMI</strong>,
                        yaitu menjadi sponsor dalam pengabdian pelayanan masyarakat.</li>
                    <li>Menjalankan <strong>Misi INIFIKOM-UMI</strong>, yaitu menjadi sebuah pusat organisasi
                        yang dinamis,
                        yang dikenal dan diakui dapat memberikan energi pada setiap ide-ide produktif,
                        serta memaksimalkan setiap potensi nilai lebih para alumnusnya di mata Indonesia.</li>
                    <li>Semangat <strong> BERSATU, BERPRESTASI,</strong> dan <strong> BERKONTRIBUSI</strong>
                        untuk Universitas Methodist Indonesia dan Indonesia</li>
                </ol>
            </div>
            </p>
            <p class="teks">
                Apa yang kita sudah mulai akan terus kita tingkatkan berupa program-program yang
                benar menyentuh dan bermanfaat untuk kita alumni, dan juga almamater. Kita terus meningkatkan
                manajemen
                yang baik untuk menjadikan wadah ini bekerja secara lebih professional dalam membagikan
                informasi,
                melaporkan setiap kegiatan yang dijalankan, melaporkan laporan keuangan secara transparan.
                Website yang sudah kita bangun diharapkan dapat meningkatkan awareness kita tentang apa yang
                dilakukan oleh INIFIKOM-UMI
                sehingga diharapkan para anggota merasakan manfaatnya dan bangga menjadi alumnus Fikom UMI. <br>
                Dengan demikian kita akan <strong> terpacu, terdorong, terinspirasi untuk berbuat yang
                    lebih</strong> untuk para sahabat alumni kita,
                almamater kita, dan bangsa kita yang kita cintai Bersama.<br>
                Tuhan memberkati kita sekalian. <br>
            <div class="d-flex justify-content-end">
                Salam, <br>
                <br>
                <br>
                Ketua INIFIKOM-UMI
            </div>
            </p>
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
@endsection
