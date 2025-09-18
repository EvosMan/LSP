@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group mb-4">
                <a href="{{ route('arsip.index') }}" class="list-group-item list-group-item-action">Arsip</a>
                <a href="{{ route('kategori.index') }}" class="list-group-item list-group-item-action">Kategori Surat</a>
                <a href="{{ route('about') }}" class="list-group-item list-group-item-action active">About</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2>About</h2>
            <div class="d-flex align-items-center mb-4">
                <img src="{{ asset('img/2141762053-VLu5M.jpg') }}" alt="Foto" class="rounded-circle me-1" width="120" height="120" style="object-fit:cover; border:2px solid #333;">
                <div>
                    <p><strong>Nama</strong> : M Ariesta Naeva Arya Dhuta</p>
                    <p><strong>Prodi</strong> : D-4 SIB Politeknik Negeri Malang</p>
                    <p><strong>NIM</strong> : 2141762053</p>
                    <p><strong>Tanggal</strong> : 19 September 2025</p>
                </div>
            </div>
            <p>Aplikasi ini dibuat untuk kebutuhan pengarsipan surat resmi di Kelurahan Karangduren, Kecamatan Pakisaji</p>
        </div>
    </div>
</div>
@endsection