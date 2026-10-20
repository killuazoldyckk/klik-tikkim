<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Paspor Republik Indonesia',
                'slug' => 'paspor-republik-indonesia',
                'description' => 'Kategori informasi paspor. Konten layanan menunggu verifikasi.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Informasi M-Paspor',
                'slug' => 'informasi-m-paspor',
                'description' => 'Kategori informasi M-Paspor. Konten layanan menunggu verifikasi.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Izin Tinggal Keimigrasian',
                'slug' => 'izin-tinggal-keimigrasian',
                'description' => 'Kategori informasi izin tinggal. Konten layanan menunggu verifikasi.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Pengaduan dan Bantuan',
                'slug' => 'pengaduan-dan-bantuan',
                'description' => 'Kategori informasi pengaduan dan bantuan. Konten menunggu verifikasi.',
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            ServiceCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category + ['is_active' => true]
            );
        }
    }
}