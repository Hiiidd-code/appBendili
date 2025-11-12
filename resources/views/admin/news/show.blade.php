@extends('layouts.app')

@section('title', 'Detail Berita (Admin)')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $news->title }}</h1>
        <p class="text-xs text-gray-500 mb-4">
            Dibuat: {{ $news->created_at->format('d M Y H:i') }}
        </p>

        @if($news->image)
            <div class="mb-4">
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full rounded-lg">
            </div>
        @endif

        <div class="prose max-w-none text-sm mb-6">
            {!! nl2br(e($news->content)) !!}
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-500 hover:underline">
                ← Kembali ke daftar
            </a>

            <div class="space-x-2">
                <a href="{{ route('admin.news.edit', $news) }}" class="text-sm text-blue-600 hover:underline">
                    Edit
                </a>
                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-600 hover:underline">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
