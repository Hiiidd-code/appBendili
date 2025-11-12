@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
        <p class="text-sm text-gray-600 mb-4">
            Selamat datang di dashboard admin. Dari sini Anda dapat mengelola berita harian kantor.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                <p class="text-xs text-gray-500">Total Berita</p>
                <p class="text-2xl font-bold text-blue-700">{{ $totalNews }}</p>
            </div>
        </div>

        <a href="{{ route('admin.news.index') }}"
           class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
            Kelola Berita
        </a>
    </div>
</div>
@endsection
