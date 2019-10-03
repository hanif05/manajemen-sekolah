<?php

function alertsukses()
{
    alert()->success('berhasil','Data Berhasil Di Simpan' );
}

function totalUsers()
{
    return App\User::count();
}

function totalGuru()
{
    return App\Guru::count();
}

function totalSiswa()
{
    return App\Siswa::count();
}

function totalKelas()
{
    return App\Kelas::count();
}