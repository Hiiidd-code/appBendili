@extends('layouts.app')

@section('title', 'Beranda - PT. United Tractors Bendili')

@section('content')
        @php
    use Illuminate\Support\Str;
        @endphp

        @viteReactRefresh
        @vite(['resources/js/app.jsx'])

            <section
                class="bg-yellow-400 rounded-none shadow w-screen p-8 space-y-8 flex flex-col md:flex-row gap-6 items-center">
                <div class="flex-1">

                    <div class="h-14 rounded-none overflow-hidden flex-shrink-0 py-2">
                        {{-- Pastikan file: public/images/boss.jpg --}}
                        <img id="text" src="{{ asset('images/splash-big.gif') }}" alt="Pimpinan Kantor"
                            class="w-full h-full object-cover ">
                    </div>
                    <p class="text-sm text-gray-600 px-3">
                        Portal informasi resmi kantor untuk karyawan dan manajemen.
                        Di sini Anda dapat melihat berita terbaru, pengumuman penting, dan akses dokumen kerja yang terhubung
                        dengan Google Drive.
                    </p>
                </div>
                <div class="w-40 h-40 rounded-none overflow-hidden flex-shrink-0">
                    {{-- Pastikan file: public/images/boss.jpg --}}
                    <img id="text" src="{{ asset('images/boss.webp') }}" alt="Pimpinan Kantor"
                        class="w-full h-full object-cover">
                </div>
            </section>

            <section>

                <div class="mx-auto grid grid-rows-2 place-items-center p-3 w-screen bg-cyan-950">
                    <div class="relative py-4 justify-between">
                        <div id="carousel-root" class="p-2"></div>
                        <div class="grid grid-flow-col grid-rows-2 gap-3 p-2">
                                    <div>
                                    <button class="bg-black h-20 opacity-70 hover:bg-neutral-800 text-white text-sm font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Development</span>
                                    </button>
                                    </div>
                                    <div>
                                    <button class="bg-black h-20 opacity-70 hover:bg-neutral-800 text-white text-sm font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Development</span>
                                    </button>
                                    </div>
                                    <div>
                                    <button class="bg-black h-20 opacity-70 hover:bg-neutral-800 text-white text-sm font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Development</span>
                                    </button>
                                    </div>
                                    <div>
                                    <button class="bg-black h-20 opacity-70 hover:bg-neutral-800 text-white text-sm font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Development</span>
                                    </button>
                                    </div>
                        </div>
                    </div>
                </div>
            </section>

        <div class="max-w-6xl mx-auto px-4 py-8 space-y-8 overflow-x-hidden ">
            {{-- Hero: ucapan selamat datang + foto pimpinan --}}

            {{-- Daftar berita terbaru --}}
            <section class="bg-green-100 rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold">Berita Harian Terbaru</h2>

                </div>

                @if($latestNews->isEmpty())

                    <div class="flex flex-col justify-center items-center gap-2">
                        <div class="relative size-32">
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
                                <a href="{{ route('news.show', $news) }}" class="inline-block text-sm text-blue-600 hover:underline">
                                    Baca Selengkapnya
                                </a>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- Link Google Drive --}}
            <section class="bg-white rounded-lg shadow p-6">
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
@endsection