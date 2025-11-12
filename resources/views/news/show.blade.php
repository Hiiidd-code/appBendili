@extends('layouts.app')

@section('title', $news->title . ' - Berita')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <article class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $news->title }}</h1>
        <p class="text-xs text-gray-500 mb-4">
            Dipublikasikan pada {{ $news->created_at->format('d M Y H:i') }}
        </p>

        @if($news->image)
            <div class="mb-4">
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}"
                     class="w-full rounded-lg object-cover">
            </div>
        @endif

        <div class="prose max-w-none text-sm">
            {!! nl2br(e($news->content)) !!}
        </div>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="text-sm text-blue-600 hover:underline">
                ← Kembali ke beranda
            </a>
        </div>
    </article>
</div>
@endsection
