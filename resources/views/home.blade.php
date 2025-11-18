@extends('layouts.app')

@section('title', 'Beranda - PT. United Tractors Bendili')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<style>
        .floating {
            position: relative;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0);
            }
        }

             body {
            margin: 0;
            padding: 0;
        }

        #text {
            position: relative;
            margin-top: 10px;
            text-align: center;
        }

        h1 {
            color: green;
        }

        #text:hover {
            animation: effect linear 1s;
        }

        @keyframes effect {
            0% {
                transform: scale(1, 1);
            }

            25% {
                transform: scale(1.3, 0.6);
            }

            50% {
                transform: scale(1.1, 0.9);
            }

            100% {
                transform: scale(1, 1);
            }
        
        }
    </style>

<div class="max-w-6xl mx-auto px-4 py-8 space-y-8">
    {{-- Hero: ucapan selamat datang + foto pimpinan --}}
    <section class="bg-yellow-400 rounded-lg shadow p-6 flex flex-col md:flex-row gap-6 items-center">
        <div class="flex-1">
            <h1 class="text-2xl md:text-3xl font-bold mb-3 floating">
                Selamat Datang di Website Kantor PT. United Tractors Bendili
            </h1>
            <p class="text-sm text-gray-600">
                Portal informasi resmi kantor untuk karyawan dan manajemen. 
                Di sini Anda dapat melihat berita terbaru, pengumuman penting, dan akses dokumen kerja yang terhubung dengan Google Drive.
            </p>
        </div>
        <div class="w-40 h-40 rounded-none overflow-hidden flex-shrink-0">
            {{-- Pastikan file: public/images/boss.jpg --}}
            <img  id="text" src="{{ asset('images/boss.webp') }}" alt="Pimpinan Kantor"
                 class="w-full h-full object-cover">
        </div>
    </section>

    {{-- Daftar berita terbaru --}}
    <section class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Berita Harian Terbaru</h2>

        </div>

        @if($latestNews->isEmpty())
            <p class="text-sm text-gray-500">Belum ada berita yang ditambahkan.</p>
        @else
            <div class="space-y-4">
                @foreach($latestNews as $news)
                    <article class="border-b last:border-b-0 pb-4 last:pb-0">
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
    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Dokumen Google Drive</h2>
        <p class="text-sm text-gray-600 mb-3">
            Dokumen berikut merupakan file penting yang disimpan di Google Drive dan dapat diakses oleh karyawan.
        </p>

        <ul class="list-disc list-inside space-y-2 text-sm">
            @foreach($google_links as $link)
                <li>
                    <a href="{{ $link['url'] }}" target="_blank"
                       class="text-blue-600 hover:underline">
                        {{ $link['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

</div>
@endsection
