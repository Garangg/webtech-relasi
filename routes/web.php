<?php

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Hobi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Relasi One To One
Route::get('relasi-1', function(){
    $mahasiswa = Mahasiswa::where('nim', '=', '1010101010')->first();
    return "Mahasiswa atas nama ".$mahasiswa->nama." ditemani oleh wali atas nama ".$mahasiswa->wali->nama;
});

// Relasi One To Many
Route::get('relasi-2',function(){
    $mahasiswa = Mahasiswa::where('nim', '=', '1010101010')->first();
    return "Mahasiswa dengan NIM ".$mahasiswa->nim." mempunyai dosen pembimbing atas nama ".$mahasiswa->dosen->nama;
});

Route::get('relasi-3', function(){
    $dosen = Dosen::where('nama', '=', 'Eko')->first();
    echo 'Mahasiswa yang dibimbing oleh dosen '.$dosen->nama.' adalah <br>';
    foreach ($dosen->mahasiswa as $temp)
        echo '<li> Nama : '.$temp->nama.
            ' <strong>( '.
            $temp->nim.' )</strong></li>';
});

// Relasi Many To Many
Route::get('relasi-4', function(){
    $mahasiswa = Mahasiswa::where('nama', '=', 'Ani')->first();
    echo 'Hobi yang ditekuni oleh '.$mahasiswa->nama.' adalah <br>';
    foreach ($mahasiswa->hobi as $temp)
        echo '<li>'.$temp->hobi.'</li>';
});

Route::get('relasi-5', function(){
    $hobi = Hobi::where('hobi', '=', 'Menulis')->first();
    echo 'Mahasiswa yang mempunyai hobi '.$hobi->hobi.' adalah <br>';
    foreach ($hobi->mahasiswa as $temp)
        echo '<li> Nama : '.$temp->nama.
            ' <strong>( '.$temp->nim.' )</strong></li>';
});

Route::get('relasi',function(){
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('relasi', compact('mahasiswa'));
});