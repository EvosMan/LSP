@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group mb-4">
                <a href="{{ route('arsip.index') }}" class="list-group-item list-group-item-action active">Arsip</a>
                <a href="{{ route('kategori.index') }}" class="list-group-item list-group-item-action">Kategori Surat</a>
                <a href="{{ route('about') }}" class="list-group-item list-group-item-action">About</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Arsip Surat</h2>
            <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="GET" action="{{ route('arsip.index') }}" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Cari!</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu Pengarsipan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($surats as $surat)
                    <tr>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->kategori->nama }}</td>
                        <td>{{ $surat->judul }}</td>
                        <td>{{ $surat->waktu_pengarsipan }}</td>
                        <td>
                            <form action="{{ route('arsip.destroy', $surat) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip surat ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <a href="{{ route('arsip.download', $surat) }}" class="btn btn-warning btn-sm">Unduh</a>
                            <a href="{{ route('arsip.show', $surat) }}" class="btn btn-primary btn-sm">Lihat &gt;&gt;</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data surat</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('arsip.create') }}" class="btn btn-success mt-2">Arsipkan Surat..</a>
        </div>
    </div>
</div>
@endsection