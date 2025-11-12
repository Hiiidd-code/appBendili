<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk mengisi tabel news
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => 'Kegiatan Rapat Bulanan di PT. United Tractors Bendili',
                'content' => 'Rapat rutin bulanan diadakan untuk membahas progres kerja dan evaluasi kinerja antar departemen.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Program Pelatihan Keselamatan Kerja 2025',
                'content' => 'PT. United Tractors Bendili mengadakan pelatihan keselamatan untuk meningkatkan kesadaran karyawan terhadap K3.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Penyerahan Penghargaan Karyawan Terbaik Bulan Ini',
                'content' => 'Manajemen memberikan penghargaan kepada karyawan berprestasi sebagai bentuk apresiasi atas dedikasi mereka.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
