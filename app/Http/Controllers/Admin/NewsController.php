<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * List semua berita untuk admin.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Form tambah berita.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Handle upload gambar (jika ada)
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = time() . '_' . $image->getClientOriginalName();
            $uploadPath = public_path('uploads/news');

            // Pastikan folder ada
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $validated['image'] = 'uploads/news/' . $imageName;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Detail berita versi admin (opsional).
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Form edit berita.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update berita.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Jika ada gambar baru, hapus lama lalu simpan baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($news->image && file_exists(public_path($news->image))) {
                @unlink(public_path($news->image));
            }

            $image      = $request->file('image');
            $imageName  = time() . '_' . $image->getClientOriginalName();
            $uploadPath = public_path('uploads/news');

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $validated['image'] = 'uploads/news/' . $imageName;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita.
     */
    public function destroy(News $news)
    {
        // Hapus file gambar jika ada
        if ($news->image && file_exists(public_path($news->image))) {
            @unlink(public_path($news->image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
