@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Arsip Surat &gt;&gt; Unggah</h2>
            <div class="alert alert-info">
                <strong>Catatan:</strong>
                <ul>
                    <li>Gunakan file berformat PDF</li>
                </ul>
            </div>
            <form action="{{ isset($surat) ? route('arsip.update', $surat) : route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($surat))
                @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori_id" name="kategori_id" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $surat->kategori_id ?? '') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $surat->judul ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File Surat (PDF)</label>
                    <input type="file" class="form-control" id="file" name="file" accept="application/pdf" {{ isset($surat) ? '' : 'required' }}>
                    @if(isset($surat) && $surat->file)
                    <small class="text-muted">File saat ini: {{ $surat->file }}</small>
                    @endif
                </div>
                <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection