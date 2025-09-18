@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2>Arsip Surat &gt;&gt; Lihat</h2>
            <div class="mb-3">
                <strong>Nomor:</strong> {{ $surat->nomor_surat }}<br>
                <strong>Kategori:</strong> {{ $surat->kategori->nama }}<br>
                <strong>Judul:</strong> {{ $surat->judul }}<br>
                <strong>Waktu Unggah:</strong> {{ $surat->waktu_pengarsipan }}
            </div>
            <div class="mb-4" style="height:500px; border:1px solid #ccc; overflow:auto;">
                <iframe src="{{ asset('storage/' . $surat->file) }}" width="100%" height="100%"></iframe>
            </div>
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
            <a href="{{ route('arsip.download', $surat) }}" class="btn btn-warning">Unduh</a>
            <a href="{{ route('arsip.edit', $surat) }}" class="btn btn-primary">Edit/Ganti File</a>
        </div>
    </div>
</div>
@endsection