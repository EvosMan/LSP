<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\Kategori;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriPengumuman = Kategori::firstOrCreate([
            'nama' => 'Pengumuman',
        ], [
            'keterangan' => 'Surat-surat yang terkait dengan pengumuman',
        ]);
        $kategoriUndangan = Kategori::firstOrCreate([
            'nama' => 'Undangan',
        ], [
            'keterangan' => 'Undangan rapat, koordinasi, dlsb.',
        ]);

        Surat::create([
            'nomor_surat' => '2022/PD3/TU/001',
            'kategori_id' => $kategoriPengumuman->id,
            'judul' => 'Nota Dinas WFH',
            'file' => 'arsip/contoh1.pdf',
            'waktu_pengarsipan' => '2023-06-21 17:23:00',
        ]);
        Surat::create([
            'nomor_surat' => '2022/PD2/TU/022',
            'kategori_id' => $kategoriUndangan->id,
            'judul' => 'Undangan Halal Bi Halal',
            'file' => 'arsip/contoh2.pdf',
            'waktu_pengarsipan' => '2023-04-21 18:23:00',
        ]);
    }
}
