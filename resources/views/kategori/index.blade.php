@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group mb-4">
                <a href="{{ route('arsip.index') }}" class="list-group-item list-group-item-action">Arsip</a>
                <a href="{{ route('kategori.index') }}" class="list-group-item list-group-item-action active">Kategori Surat</a>
                <a href="{{ route('about') }}" class="list-group-item list-group-item-action">About</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Kategori Surat</h2>
            <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>Klik "Tambah" pada kolom aksi untuk menambah kategori baru.</p>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form method="GET" action="{{ route('kategori.index') }}" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="search" value="{{ request('search') }}">
                <button class="btn btn-outline-primary" type="submit">Cari!</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->keterangan }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data kategori</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('kategori.create') }}" class="btn btn-success mt-2">[ + ] Tambah Kategori Baru...</a>
        </div>
    </div>
</div>
@endsection