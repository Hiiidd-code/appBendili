@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
        <p class="text-xl text-gray-600 mb-8">Halaman yang Anda cari tidak ditemukan.</p>
        <a href="{{ route('home') }}" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
