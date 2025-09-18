@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Kategori Surat &gt;&gt; {{ isset($kategori) ? 'Edit' : 'Tambah' }}</h2>
            <form action="{{ isset($kategori) ? route('kategori.update', $kategori) : route('kategori.store') }}" method="POST">
                @csrf
                @if(isset($kategori))
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label class="form-label">ID (Auto Increment)</label>
                    <input type="text" class="form-control" value="{{ isset($kategori) ? $kategori->id : $nextId }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $kategori->nama ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Judul</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="2" required>{{ old('keterangan', $kategori->keterangan ?? '') }}</textarea>
                </div>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection