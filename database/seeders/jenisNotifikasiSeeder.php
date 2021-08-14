<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class jenisNotifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_notifikasi')->insert([
            [
                'id' => Str::uuid()->toString(),
                'nama_notifikasi' => 'Request Akun Baru'
            ],
            [
                'id' => Str::uuid()->toString(),
                'nama_notifikasi' => 'Kritik dan Saran'
            ],
            [
                'id' => Str::uuid()->toString(),
                'nama_notifikasi' => 'Redirect Kritik dan Saran'
            ],
            [
                'id' => Str::uuid()->toString(),
                'nama_notifikasi' => 'Rating Baru'
            ]
        ]);
    }
}
