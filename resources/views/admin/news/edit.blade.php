@extends('layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-xl font-semibold mb-4">Edit Berita</h1>

        @if($errors->any())
            <div class="mb-4 text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}"
                       class="w-full border rounded px-3 py-2 text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Isi Berita</label>
                <textarea name="content" rows="8"
                          class="w-full border rounded px-3 py-2 text-sm"
                          required>{{ old('content', $news->content) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Gambar (opsional)</label>
                @if($news->image)
                    <div class="mb-2">
                        <img src="{{ asset($news->image) }}" alt="" class="w-32 h-20 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                       class="w-full text-sm">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-500 hover:underline">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
