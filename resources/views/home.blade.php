@extends('layouts.app')

@section('title', 'Beranda - PT. United Tractors Bendili')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp

    @viteReactRefresh
    @vite(['resources/js/app.jsx'])

    <div class="pt-4 z-0">
        <section class="bg-yellow-400 rounded-none shadow w-screen p-8 space-y-8 flex flex-row gap-6 items-center">
            <div class="">

                <div class="h-14 sm:h-28 md:h-36 lg:h-44 rounded-none overflow-hidden">
                    {{-- Pastikan file: public/images/boss.jpg --}}
                    <img id="text" src="{{ asset('images/splash-big.gif') }}" alt="Pimpinan Kantor"
                        class="w-full h-full object-cover">
                </div>
                <p class="text-sm text-gray-600 px-3 sm:text-xs md:text-sm lg:text-md">
                    Portal informasi resmi kantor untuk karyawan dan manajemen.
                    Di sini Anda dapat melihat berita terbaru, pengumuman penting, dan akses dokumen kerja yang terhubung
                    dengan Google Drive.
                </p>
            </div>
            <div class="w-40 h-40 rounded-none overflow-hidden flex-shrink-0 sm:size-40 md:size-40 lg:size-40">
                {{-- Pastikan file: public/images/boss.jpg --}}
                <img id="text" src="{{ asset('images/boss.webp') }}" alt="Pimpinan Kantor"
                    class="w-full h-full object-cover">
            </div>
        </section>

        <section>
            <div class="mx-auto grid grid-cols-1 p-2 px-15 sm:px-10 md:px-24 bg-cyan-950">
                <div class="grid grid-cols-2 justify-center items-start gap-1">
                    <!-- KIRI: Carousel -->
                    <div class="p-0">
                        <div class="relative w-full h-40 md:h-56 bg-black/70 rounded-md overflow-hidden flex items-center justify-center">
                            <div class="absolute inset-0 blur-xl scale-10 bg-cover bg-center opacity-50"
                                    style="background-image: url('/images/caraousel-a/img1.jpg')"></div>
                            <div id="carousel-root" class="w-full h-full rounded-md overflow-hidden"></div>
                        </div>
                    </div>

                    <!-- KANAN: 4 Buttons -->
                    <div class="grid grid-cols-2 overflow-hidden h-40 md:h-56">
                        <div>
                            <div class="w-full h-20 md:h-28 p-1">
                                <button class="w-full h-full rounded-lg bg-neutral-950 text-white text-xs md:text-sm">
                                    <h1 class="p-2 break-words">Development123456789</h1>
                                </button>
                            </div>
                            <div class="w-full h-20 md:h-28 p-1">
                                <button class="w-full h-full rounded-lg bg-neutral-950 text-white text-xs md:text-sm">
                                    <h1 class="p-2 break-words">Cevelopment123456789</h1>
                                </button>
                            </div>
                        </div>

                        <div>
                            <div class="w-full h-20 md:h-28 p-1">
                                <button class="w-full h-full rounded-lg bg-neutral-950 text-white text-xs md:text-sm">
                                    <h1 class="p-2 break-words">Aevelopment123456789</h1>
                                </button>
                            </div>
                            <div class="w-full h-20 md:h-28 p-1">
                                <button class="w-full h-full rounded-lg bg-neutral-950 text-white text-xs md:text-sm">
                                    <h1 class="p-2 break-words">Bevelopment123456789</h1>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="max-w-6xl mx-auto px-4 py-8 space-y-8 overflow-x-hidden ">
            {{-- Daftar berita terbaru --}}
            <section class="bg-green-100 rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold">Berita Harian Terbaru</h2>

                </div>

                @if($latestNews->isEmpty())

                    <div class="flex flex-col justify-center items-center gap-2">
                        <div class="size-32">
                            <img src="{{ asset('images/kosong.webp') }}" class="opacity-50">
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Belum ada berita yang ditambahkan.</p>
                        </div>
                    </div>

                @else
                    <div class="space-y-4">
                        @foreach($latestNews as $news)
                            <article class="border-b last:border-b-0 pb-4 last:pb-0 hover:gray-200">
                                <h3 class="font-semibold text-lg">
                                    <a href="{{ route('news.show', $news) }}" class="hover:text-blue-600">
                                        {{ $news->title }}
                                    </a>
                                </h3>
                                <p class="text-xs text-gray-500 mb-1">
                                    {{ $news->created_at->format('d M Y H:i') }}
                                </p>
                                <p class="text-sm text-gray-700 mb-2">
                                    {{ Str::limit(strip_tags($news->content), 150) }}
                                </p>
                                <a href="{{ route('news.show', $news) }}"
                                    class="inline-block text-sm text-blue-600 hover:underline">
                                    Baca Selengkapnya
                                </a>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- Link Google Drive --}}
            <section class="relative bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4">Dokumen Google Drive</h2>
                <p class="text-sm text-gray-600 mb-3">
                    Dokumen berikut merupakan file penting yang disimpan di Google Drive dan dapat diakses oleh karyawan.
                </p>

                <ul class="list-disc list-inside space-y-2 text-sm">
                    @foreach($google_links as $link)
                        <li>
                            <a href="{{ $link['url'] }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $link['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

        </div>
    </div>
@endsection