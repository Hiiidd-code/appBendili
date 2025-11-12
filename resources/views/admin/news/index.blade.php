@extends('layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold">Daftar Berita</h1>
            <a href="{{ route('admin.news.create') }}"
               class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
               + Tambah Berita
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-sm text-green-700 bg-green-50 border border-green-200 rounded px-3 py-2">
                {{ session('success') }}
            </div>
        @endif

        @if($news->isEmpty())
            <p class="text-sm text-gray-500">Belum ada berita.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="text-left px-3 py-2">Judul</th>
                            <th class="text-left px-3 py-2">Tanggal</th>
                            <th class="text-left px-3 py-2">Gambar</th>
                            <th class="text-left px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                            <tr class="border-b">
                                <td class="px-3 py-2 align-top">
                                    <a href="{{ route('admin.news.show', $item) }}"
                                       class="font-semibold hover:text-blue-600">
                                        {{ $item->title }}
                                    </a>
                                </td>
                                <td class="px-3 py-2 align-top text-xs text-gray-500">
                                    {{ $item->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="px-3 py-2 align-top">
                                    @if($item->image)
                                        <img src="{{ asset($item->image) }}" alt="" class="w-16 h-10 object-cover rounded">
                                    @else
                                        <span class="text-xs text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-3 py-2 align-top space-x-1">
                                    <a href="{{ route('admin.news.edit', $item) }}"
                                       class="text-xs text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item) }}" method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-red-600 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
