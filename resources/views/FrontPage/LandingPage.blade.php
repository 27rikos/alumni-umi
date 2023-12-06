<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:ital,wght@0,100;0,400;1,600&display=swap"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('landing_page.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-body-tertiary navbar-light shadow sticky-top ">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Alumni <span class="name">UMI</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active " href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pencarian">Pencarian</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link active" href="#"data-bs-toggle="dropdown" aria-expanded="false">Gallery</a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/media/foto">Foto</a></li>
                              <li><a class="dropdown-item" href="/media/video">Video</a></li>
                            </ul>
                          </div>
                       
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/lowongan">Lowongan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
      <section id="hero" class="hero">
        <div class="container-lg">
          <div class="row min-vh-100 align-items-center align-content-center">
            <div class="col-md-6">
              <div class="home-img text-center">
                <div data-aos="zoom-in" data-aos-duration="2000">
                  <img
                    src="{{ asset('img/logo.png') }}"
                    class=" mw-100 img-home m-3"
                    alt=""
                    srcset=""
                    id="logo"
                  />
                </div>
              </div>
            </div>
            <div class="col-md-6 order-md-first">
              <div class="home-text">
                <div data-aos="fade-right" data-aos-duration="2000">
                  <h5 class="heading-sm">Portal Alumni</h5>
                  <h3 class="heading-lg">
                 <span class="name">Univeristas Methodist Indonesia</span>
                  </h3>
                  <h5 class="heading-md fst-italic">
                    "esse est in intellectu"
                  </h5>
                  <a href="/login" class="btn btn-primary btn-lg px-3 my-4 fw-bold mb-5 login ">Log in</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <section class="min-vh-100 py-5">
        <div class="container">
        <h3 class=" text-center text-primary">Kata Sambutan</h3>
        <h2 class="text-center ">Ketua Alumni FIKOM UMI</h2> <hr>
        <div class="row ">
            <div class="col-md-4 text-center" data-aos="zoom-in" data-aos-duration="2000">
                <img src="{{ asset('img/logo.png') }}"  alt="logo UMI" id="logo">
            </div>
            <div class="col-md-8">
                <p class="teks">
                    SHALOM Sahabat Alumni Fikom UMI yang diberkati Tuhan, <br>
                    Alumni Fakultas Ilmu Komputer Universitas Methodist Indonesia yang tangguh,hebat dan kuat.
                    Alumni yang perduli almamaternya   Kita patut mengucapkan syukur atas segala berkat yang Tuhan
                     sudah berikan kepada kita para tamatan Fakultas Ilmu Komputer Universitas Methodist Indonesia 
                     sehingga kita semua, hingga saat ini tetap bersatu dalam roh pelayanan, saling mendukung, 
                     saling menginspirasi dan saling memotivasi melalui organisasi perkumpulan yang kita cintai
                    bersama yaitu Ikatan Alumni Fakultas Ilmu Komputer Universitas Methodist Indonesia(INIFIKOM-UMI).<br>
                    Melalui INIFIKOM-UMI:
                   <div class="teks">
                    <ol>
                        <li>kita bisa memberikan kontribusi yang terbaik sesuai dengan kemampuan kita
                             masing-masing, untuk kebaikan dan kemajuan para alumni, almamater dan bangsa kita.</li>
                        <li>Wewujudkan bersama tercapainya <strong> VISI INIFIKOM-UMI</strong>,
                             yaitu menjadi sponsor dalam pengabdian pelayanan masyarakat.</li>
                        <li>Menjalankan <strong>Misi INIFIKOM-UMI</strong>, yaitu menjadi sebuah pusat organisasi yang dinamis, 
                            yang dikenal dan diakui dapat memberikan energi pada setiap ide-ide produktif, 
                            serta memaksimalkan setiap potensi nilai lebih para alumnusnya di mata Indonesia.</li>
                        <li>Semangat <strong> BERSATU, BERPRESTASI,</strong> dan <strong> BERKONTRIBUSI</strong> 
                            untuk Universitas Methodist Indonesia dan Indonesia</li>
                    </ol>
                   </div>
                </p>
                <p class="teks">
                    Apa yang kita sudah mulai akan terus kita tingkatkan berupa program-program yang 
                    benar menyentuh dan bermanfaat untuk kita alumni, dan juga almamater. Kita terus meningkatkan manajemen
                     yang baik untuk menjadikan wadah ini bekerja secara lebih professional dalam membagikan informasi, 
                     melaporkan setiap kegiatan yang dijalankan, melaporkan laporan keuangan secara transparan. 
                     Website yang sudah kita bangun diharapkan dapat meningkatkan awareness kita tentang apa yang dilakukan oleh INIFIKOM-UMI 
                    sehingga diharapkan para anggota merasakan manfaatnya dan bangga menjadi alumnus Fikom UMI. <br>
                    Dengan demikian kita akan <strong> terpacu, terdorong, terinspirasi untuk berbuat yang lebih</strong> untuk para sahabat alumni kita,
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
        </div>
        </div>
    </section>
    <section class="min-vh-100 py-5">
            <div class="container">
                <div class="d-flex">
                    <div class="p-2 w-100"><h4>Berita Terbaru</h4> </div>
                    <div class="p-1 flex-shrink-1"><a href="/view/berita" class="btn btn-outline-primary">Selengkapnya</a></div>
                  </div> <hr>
                <div class="row">
                    @forelse ($datas as $item)
                    <div class="col  d-flex justify-content-center">
                        <div class="card" style="width: 20rem; height:19rem">
                            <img src="{{asset('storage/berita/'.$item->file)}}" class="card-img-top object-fit-cover" alt="..." style="height: 150px;">
                            <div class="card-body">
                              <p class="text-secondary"><i class="fa-regular fa-calendar-days fa-sm me-3"></i>{{ $item->tanggal }}</p>
                              <a href="/view/{{ $item->id }}/berita" style="text-decoration:none">{{ $item->judul }}</a>
                              <p class="card-text">{{ Str::limit(Strip_tags($item['konten']), 30,".....") }}</p>
                            </div>
                          </div>
                    </div>
                    @empty
                    <div class="alert alert-info mt-5 text-center" role="alert">
                       Berita belum tersedia
                      </div>
                    @endforelse
                    
                </div>

               
            </div>
        </div>
    </section>
    <footer class="footer mt-3 text-light">
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <h5>CONTACT:</h5>
                    <ul>
                    <i class="fa-solid fa-location-dot fa-lg"></i>
                        <li class="i text-light mb-2"> Jl. Hang Tuah No. 8 Madras Hulu, Kecamatan Medan Polonia, Kota
                            Medan, Sumatra Utara</li>
                        <i class="fa-solid fa-envelope fa-xl  mt-2"></i>
                        <li class="i text-light">www.methodist.ac.id</li>
                    </ul>
                </div>
                <div class="col ms-2">
                    <h5 class="media mb-3 ">FOLLOW US:</h5>
                    <ul class="d-flex">
                        <li class="icons me-3"> <a href="https://www.facebook.com/fikom.univmethodist?mibextid=ZbWKwL"><i class="fa-brands fa-facebook fa-2xl"style="color: #f7f7f7;" ></i></a>
                        </li>
                        <li class="icons me-3"> <a href="#"><i class="fa-brands fa-telegram fa-2xl" style="color: #f7f7f7;"></i></a>
                        </li>
                        <li class="icons me-3"> <a href="https://instagram.com/prodi_si_fikom_umi?igshid=MjEwN2IyYWYwYw=="><i class="fa-brands fa-instagram fa-2xl" style="color: #f7f7f7;"></i></a>
                        </li>
                        <li class="icons"> <a href="https://www.youtube.com/@fikomumi5881/about"><i class="fa-brands fa-youtube fa-2xl" style="color: #f7f7f7;"></i></a>
                        </li>
                    </ul>
                </div>
               
            </div>
        </div>
      <div class="text-center p-3">
        &copy;2023 Copyright : <a href="#head" class="text-light">UNIVERSITAS METHODIST INDONESIA</a>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>

