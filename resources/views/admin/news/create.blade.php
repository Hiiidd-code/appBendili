@extends('layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-xl font-semibold mb-4">Tambah Berita</h1>

        @if($errors->any())
            <div class="mb-4 text-sm text-red-600">
                @foreach($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full border rounded px-3 py-2 text-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Isi Berita</label>
                {{-- Nantinya bisa diganti editor WYSIWYG (TinyMCE, CKEditor, dll) --}}
                <textarea name="content" rows="8"
                          class="w-full border rounded px-3 py-2 text-sm"
                          required>{{ old('content') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Gambar (opsional)</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full text-sm">
                <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG, maks 2 MB.</p>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-500 hover:underline">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
