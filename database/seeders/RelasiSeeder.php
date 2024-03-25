<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Hobi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Wali;
use Illuminate\Support\Facades\DB;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->delete();
        DB::table('wali')->delete();
        DB::table('dosen')->delete();
        DB::table('hobi')->delete();
        DB::table('mahasiswa_hobi')->delete();

        // tabel hobi
        $menulis = Hobi::create(array('hobi' => 'Menulis'));
        $baca_buku = Hobi::create(array('hobi' => 'Baca buku'));

        $dosen = Dosen::create([
            'nama' => 'Eko',
            'nipd' => '1234567890',
        ]);

        $ani = Mahasiswa::create([
            'nama' => 'Ani',
            'nim' => '1010101010',
            'id_dosen' => $dosen->id,
        ]);
        $budi = Mahasiswa::create([
            'nama' => 'Budi',
            'nim' => '2020202020',
            'id_dosen' => $dosen->id,
        ]);
        $nia = Mahasiswa::create([
            'nama' => 'Nia',
            'nim' => '3030303030',
            'id_dosen' => $dosen->id,
        ]);

        Wali::create([
            'nama' => 'Henny A',
            'id_mahasiswa' => $ani->id,
        ]);

        Wali::create([
            'nama' => 'Andy S',
            'id_mahasiswa' => $budi->id,
        ]);

        Wali::create([
            'nama' => 'Viki D',
            'id_mahasiswa' => $nia->id,
        ]);

        // Hubungkan dengan mahasiswa
        $ani->hobi()->attach($menulis->id);
        $budi->hobi()->attach($baca_buku->id);
        $nia->hobi()->attach($menulis->id);
    }
}
