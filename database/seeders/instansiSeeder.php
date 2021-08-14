<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class instansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instansi')->insert([
            [
                 'id' => Str::uuid()->toString(),
                'instansi_name' => 'Dinas Komunikasi dan Informatika',
                 'instansi_address' => 'Komplek Perkantoran Tano Tubu Km.3.3, Tano Tubu, Pasaribu, Dolok sanggul, Kabupaten Humbang Hasundutan, Sumatera Utara 22457',
                 'instansi_website_link' => 'https://diskominfo.humbanghasundutankab.go.id',
                 'instansi_descriptions' => 'Dinas Komunikasi dan Informatika Kabupaten Humbang Hasundutan'
            ],
            [
                'id' => Str::uuid()->toString(),
                'instansi_name' => 'Dinas Pendidikan',
                'instansi_address' => 'Komplek Perkantoran Tano Tubu Km.3.3, Tano Tubu, Pasaribu, Dolok sanggul, Kabupaten Humbang Hasundutan, Sumatera Utara 22457',
                'instansi_website_link' => 'https://dispen.humbanghasundutankab.go.id/',
                'instansi_descriptions' => 'Dinas Komunikasi dan Informatika Kabupaten Humbang Hasundutan'
            ],
            [
                'id' => Str::uuid()->toString(),
                'instansi_name' => 'Dinas Kesehatan',
                'instansi_address' => 'Komplek Perkantoran Tano Tubu Km.3.3, Tano Tubu, Pasaribu, Dolok sanggul, Kabupaten Humbang Hasundutan, Sumatera Utara 22457',
                'instansi_website_link' => 'https://dinkes.humbanghasundutankab.go.id/',
                'instansi_descriptions' => 'Dinas Komunikasi dan Informatika Kabupaten Humbang Hasundutan'
            ],
            [
                'id' => Str::uuid()->toString(),
                'instansi_name' => 'Dinas Sosial',
                'instansi_address' => 'Komplek Perkantoran Tano Tubu Km.3.3, Tano Tubu, Pasaribu, Dolok sanggul, Kabupaten Humbang Hasundutan, Sumatera Utara 22457',
                'instansi_website_link' => 'https://dinsos.humbanghasundutankab.go.id/',
                'instansi_descriptions' => 'Dinas Komunikasi dan Informatika Kabupaten Humbang Hasundutan'
            ]
            
        ]);
    }
}
