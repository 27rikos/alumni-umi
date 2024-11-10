@extends('Partials.Person')
@section('title', 'FAQ')
@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Frequently Asked Questions
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionExample">

                    <!-- Accordion Item 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Apa yang dimaksud dengan "Tanggal Seminar Hasil", "Tanggal Meja Hijau", dan "Yudisium"?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Tanggal-tanggal tersebut harus diisi sesuai dengan waktu pelaksanaan kegiatan akademik Anda.
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Format foto seperti apa yang dapat diunggah?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Anda bisa mengunggah foto dalam format <strong>JPG, JPEG, atau PNG</strong> dengan ukuran
                                maksimal <strong>1MB</strong>.
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apakah saya wajib mengunggah foto alumni, KTP, dan ijazah?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Ya, unggah foto diri, KTP, dan ijazah Anda untuk melengkapi data registrasi. Pastikan ukuran
                                file sesuai dengan ketentuan dan format yang didukung.
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Bagaimana cara mengisi NIK dan mengunggah KTP?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Masukkan Nomor Induk Kependudukan (NIK) Anda di kolom yang tersedia. Untuk mengunggah KTP,
                                klik tombol <strong>"Choose File"</strong> dan pilih file KTP Anda dalam format yang
                                didukung <strong>(JPG, JPEG, PNG)</strong>.
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Bagaimana format foto yang harus diunggah untuk KTP, ijazah, dan foto diri?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li><strong>Foto Diri (Foto Alumni)</strong>: Format file harus <strong>JPG, JPEG, atau
                                            PNG</strong>, dengan latar belakang polos (merah atau biru). Wajah harus
                                        terlihat jelas, tanpa aksesori yang menutupi wajah, dan ukuran maksimal 1MB.</li>
                                    <li><strong>KTP</strong>: Foto KTP harus jelas dan terbaca, dalam format <strong>JPG,
                                            JPEG, PNG, atau PDF</strong>, dengan ukuran maksimal 1MB.</li>
                                    <li><strong>Ijazah</strong>: Pastikan hasil foto atau scan ijazah jelas dan informasi
                                        dapat terbaca. Format file harus <strong>JPG, JPEG, PNG, atau PDF</strong>, dan
                                        ukuran maksimal 1MB.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion Item 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Apa yang harus dilakukan jika data saya ada yang salah atau belum lengkap, tetapi sudah
                                di-approve oleh admin?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Jika Anda menemukan bahwa data Anda salah atau belum lengkap tetapi sudah di-approve oleh
                                admin, Anda harus segera menghubungi admin atau tim pendukung teknis untuk meminta pembaruan
                                data. Sertakan detail tentang data yang perlu diubah atau ditambahkan, beserta bukti yang
                                mendukung (jika diperlukan). Proses perbaikan ini mungkin memerlukan waktu dan persetujuan
                                dari admin. Untuk file permintaan perbaikan data dapat diunduh <a
                                    href="{{ asset('static/SURAT PERMINTAAN PERBAIKAN DATA.docx') }}" download>disini.</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
