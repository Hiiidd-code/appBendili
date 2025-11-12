<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Halaman utama (/) untuk karyawan/guest.
     */
    public function index()
    {
        // Ambil 5 berita terbaru
        $latestNews = News::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Contoh link Google Drive (bisa kamu ganti dengan data dari DB kalau mau)
        $google_links = [
            [
                'title' => 'SOP Umum Perkantoran',
                'url'   => 'https://drive.google.com/your-sop-link',
            ],
            [
                'title' => 'Formulir Pengajuan Cuti',
                'url'   => 'https://drive.google.com/your-cuti-link',
            ],
            [
                'title' => 'Laporan Bulanan PT. United Tractors Bendili',
                'url'   => 'https://drive.google.com/your-report-link',
            ],
        ];

        return view('home', [
            'latestNews'   => $latestNews,
            'google_links' => $google_links,
        ]);
    }

    /**
     * Halaman detail berita untuk guest: /news/{news}
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Halaman dashboard admin sederhana.
     */
    public function adminDashboard()
    {
        $totalNews = News::count();

        return view('admin.dashboard', compact('totalNews'));
    }
}
