<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class InitialContentSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Paspor',
                'slug' => 'paspor',
                'description' => 'Informasi layanan permohonan dan penggantian paspor.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Izin Tinggal',
                'slug' => 'izin-tinggal',
                'description' => 'Informasi umum mengenai layanan izin tinggal keimigrasian.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Informasi Keimigrasian',
                'slug' => 'informasi-keimigrasian',
                'description' => 'Informasi umum dan panduan layanan keimigrasian.',
                'sort_order' => 3,
            ],
            [
                'name' => 'Pengaduan dan Informasi Publik',
                'slug' => 'pengaduan-informasi-publik',
                'description' => 'Informasi kanal komunikasi dan pengaduan layanan.',
                'sort_order' => 4,
            ],
        ];

        $categoryIds = [];

        foreach ($categories as $data) {
            $category = ServiceCategory::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    ...$data,
                    'is_active' => true,
                ]
            );

            $categoryIds[$data['slug']] = $category->id;
        }

        $services = [
            [
                'category' => 'paspor',
                'title' => 'Informasi Permohonan Paspor Baru',
                'slug' => 'permohonan-paspor-baru',
                'summary' => 'Informasi awal mengenai proses permohonan paspor baru.',
                'content' => <<<'TEXT'
Informasi ini merupakan draf awal untuk membantu masyarakat memahami layanan permohonan paspor baru.

Sebelum mengajukan permohonan, pemohon perlu memeriksa persyaratan dokumen, prosedur pendaftaran, mekanisme pembayaran, serta ketentuan layanan terbaru melalui kanal resmi Direktorat Jenderal Imigrasi.

Persyaratan, biaya, jadwal, dan mekanisme pelayanan harus dikonfirmasi oleh petugas sebelum informasi ini diterbitkan.
TEXT,
                'sort_order' => 1,
            ],
            [
                'category' => 'paspor',
                'title' => 'Informasi Penggantian Paspor',
                'slug' => 'penggantian-paspor',
                'summary' => 'Gambaran awal mengenai layanan penggantian paspor.',
                'content' => <<<'TEXT'
Halaman ini disiapkan untuk menjelaskan layanan penggantian paspor, termasuk kondisi paspor yang dapat diganti dan dokumen yang perlu dipersiapkan.

Ketentuan dapat berbeda bergantung pada kondisi paspor dan keadaan pemohon. Periksa ketentuan resmi terbaru sebelum mengajukan permohonan.

Rincian persyaratan, biaya, dan alur layanan harus ditinjau oleh petugas sebelum diterbitkan.
TEXT,
                'sort_order' => 2,
            ],
            [
                'category' => 'paspor',
                'title' => 'Panduan Informasi M-Paspor',
                'slug' => 'panduan-m-paspor',
                'summary' => 'Informasi awal mengenai aplikasi dan proses pendaftaran paspor.',
                'content' => <<<'TEXT'
Halaman ini akan memuat panduan penggunaan M-Paspor untuk membantu masyarakat memahami proses pengajuan permohonan paspor.

Panduan final perlu menjelaskan tahapan pendaftaran, pemilihan jadwal, pembayaran apabila berlaku, serta penanganan kendala aplikasi berdasarkan petunjuk resmi terbaru.

Gunakan kanal resmi untuk memperoleh informasi dan menghindari pihak yang menjanjikan proses di luar prosedur.
TEXT,
                'sort_order' => 3,
            ],
            [
                'category' => 'izin-tinggal',
                'title' => 'Informasi Layanan Izin Tinggal',
                'slug' => 'informasi-layanan-izin-tinggal',
                'summary' => 'Informasi umum mengenai layanan izin tinggal bagi warga negara asing.',
                'content' => <<<'TEXT'
Halaman ini disiapkan sebagai pintu masuk informasi layanan izin tinggal keimigrasian.

Jenis izin tinggal, persyaratan, masa berlaku, biaya, dan prosedur bergantung pada kondisi serta kategori permohonan masing-masing.

Pemohon perlu memastikan informasi yang sesuai dengan kebutuhannya melalui kanal resmi keimigrasian. Rincian prosedur harus diverifikasi sebelum konten diterbitkan.
TEXT,
                'sort_order' => 1,
            ],
            [
                'category' => 'informasi-keimigrasian',
                'title' => 'Panduan Mengakses Informasi Keimigrasian',
                'slug' => 'panduan-informasi-keimigrasian',
                'summary' => 'Panduan menemukan informasi layanan melalui kanal resmi.',
                'content' => <<<'TEXT'
KLIK TIKKIM dirancang sebagai kanal informasi terpadu untuk membantu masyarakat menemukan informasi layanan keimigrasian dalam satu tempat.

Masyarakat dapat menggunakan pencarian portal untuk menemukan informasi berdasarkan kata kunci. Informasi yang telah diverifikasi dan diterbitkan akan ditampilkan kepada publik.

Jika informasi yang dibutuhkan belum tersedia, gunakan kanal komunikasi resmi Kantor Imigrasi untuk memperoleh arahan lebih lanjut.
TEXT,
                'sort_order' => 1,
            ],
            [
                'category' => 'pengaduan-informasi-publik',
                'title' => 'Informasi Kanal Pengaduan dan Komunikasi',
                'slug' => 'kanal-pengaduan-dan-komunikasi',
                'summary' => 'Informasi awal mengenai cara menyampaikan pertanyaan atau pengaduan layanan.',
                'content' => <<<'TEXT'
Halaman ini disiapkan untuk memuat kanal resmi penyampaian pertanyaan, saran, dan pengaduan terkait pelayanan keimigrasian.

Sebelum diterbitkan, pengelola perlu mencantumkan kanal yang benar-benar aktif, jam operasional jika ada, tata cara penyampaian pengaduan, serta informasi yang perlu disiapkan masyarakat.

Hindari mencantumkan nomor telepon, alamat surel, atau akun media sosial sebelum kepemilikannya dikonfirmasi.
TEXT,
                'sort_order' => 1,
            ],
        ];

        $serviceIds = [];

        foreach ($services as $data) {
            $categorySlug = $data['category'];
            unset($data['category']);

            $service = Service::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    ...$data,
                    'service_category_id' => $categoryIds[$categorySlug],
                    'publication_status' => 'draft',
                    'is_verified' => false,
                    'verified_at' => null,
                    'verified_by_name' => null,
                ]
            );

            $serviceIds[$service->slug] = $service->id;
        }

        $faqs = [
            [
                'service_slug' => 'permohonan-paspor-baru',
                'question' => 'Di mana saya dapat memeriksa persyaratan permohonan paspor?',
                'answer' => 'Periksa informasi persyaratan terbaru melalui kanal resmi Direktorat Jenderal Imigrasi. Rincian persyaratan yang berlaku perlu dikonfirmasi sebelum FAQ ini diterbitkan.',
                'sort_order' => 1,
            ],
            [
                'service_slug' => 'panduan-m-paspor',
                'question' => 'Bagaimana cara memulai pendaftaran paspor melalui M-Paspor?',
                'answer' => 'Gunakan petunjuk resmi M-Paspor untuk mengikuti proses pendaftaran. Tahapan dan ketentuan yang ditampilkan pada FAQ final harus diperiksa kembali berdasarkan panduan resmi terbaru.',
                'sort_order' => 2,
            ],
            [
                'service_slug' => 'penggantian-paspor',
                'question' => 'Apakah persyaratan penggantian paspor selalu sama?',
                'answer' => 'Persyaratan dapat bergantung pada kondisi paspor dan keadaan pemohon. Periksa ketentuan resmi yang sesuai dengan kondisi Anda sebelum mengajukan permohonan.',
                'sort_order' => 3,
            ],
            [
                'service_slug' => 'informasi-layanan-izin-tinggal',
                'question' => 'Di mana saya dapat mengetahui persyaratan izin tinggal?',
                'answer' => 'Persyaratan bergantung pada jenis izin tinggal dan kondisi permohonan. Gunakan kanal resmi keimigrasian untuk memastikan ketentuan yang berlaku.',
                'sort_order' => 4,
            ],
            [
                'service_slug' => null,
                'question' => 'Mengapa informasi di KLIK TIKKIM belum tersedia?',
                'answer' => 'Informasi baru akan ditampilkan kepada publik setelah diperiksa, diverifikasi, dan diterbitkan oleh pengelola yang berwenang.',
                'sort_order' => 5,
            ],
            [
                'service_slug' => 'kanal-pengaduan-dan-komunikasi',
                'question' => 'Bagaimana cara menyampaikan pertanyaan atau pengaduan?',
                'answer' => 'Gunakan kanal komunikasi resmi yang dicantumkan pada halaman informasi setelah kanal tersebut dikonfirmasi aktif oleh pengelola.',
                'sort_order' => 6,
            ],
        ];

        foreach ($faqs as $data) {
            $serviceSlug = $data['service_slug'];
            unset($data['service_slug']);

            Faq::updateOrCreate(
                ['question' => $data['question']],
                [
                    ...$data,
                    'service_id' => $serviceSlug === null
                        ? null
                        : $serviceIds[$serviceSlug],
                    'publication_status' => 'draft',
                    'is_verified' => false,
                    'verified_at' => null,
                    'verified_by_name' => null,
                ]
            );
        }
    }
}
