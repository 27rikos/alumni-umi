@extends('Partials.Frontpage')
@section('title', 'Berita')
@section('content')
    <section>
        <div class="container pt-5">
            <div class="row mt-5">
                <div class="col-md-8">
                    <article class="mb-5">
                        <img src="{{ asset('images/berita/' . $data->file) }}" id="main-img" alt=""
                            class="mb-3 img-fluid" />
                        <h3>{{ $data->judul }}</h3>
                        <div class="d-flex gap-2">
                            <p>
                                <i class="fas fa-user-circle "></i> <span>{{ $data->penulis }}</span>
                            </p>
                            @php
                                $dateString = $data->tanggal;
                                $tanggal = strftime('%d %B %Y', strtotime($dateString));
                            @endphp

                            <p>
                                <i class="fas fa-calendar-alt ml-2 mr-1"></i><span>{{ $tanggal }}</span>
                            </p>
                        </div>
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style mb-3">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_threads"></a>
                            <a class="a2a_button_x"></a>
                            <a class="a2a_button_telegram"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                        <article style="text-align: justify" class="mb-3"> {!! $data->konten !!}</article>

                    </article>
                </div>
                <div class="col-md-4">
                    <h3>Berita lainnya</h3>
                    <hr />
                    @forelse ($all as $item)
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <div class="img-hover-zoom">
                                        <img src="{{ asset('images/berita/' . $item->file) }}" id="sc-img"
                                            class="rounded img-fluid" alt="" />
                                    </div>
                                    <a href="/read/{{ $item->id }}">
                                        <h6 class="mt-2">{{ $item->judul }}</h6>
                                    </a>
                                    <p>{{ $item->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
