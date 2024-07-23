@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Detail Rekap</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Rekap</h6>
    </div>
    <div class="card-body">
        <p><strong>Nama:</strong> {{ $rekap->nama }}</p>
        <p><strong>Kegiatan:</strong> {{ $rekap->kegiatan }}</p>
        <p><strong>Lokasi:</strong> {{ $rekap->lokasi }}</p>
        <p><strong>Tanggal:</strong> {{ $rekap->tanggal }}</p>
        <p><strong>Keterangan:</strong> {{ $rekap->keterangan }}</p>
        <p><strong>Dokumentasi:</strong></p>

        @if ($rekap->dokumentasi)
        <div class="mb-3">
            <a href="{{ asset('storage/' . $rekap->dokumentasi) }}" data-lightbox="image-{{ $rekap->id }}" data-title="Dokumentasi: {{ $rekap->nama }}">
                <img src="{{ asset('storage/' . $rekap->dokumentasi) }}" alt="Dokumentasi" class="img-fluid" style="width: 250px; height: auto;">
            </a>
        </div>
        @else
        <p>Tidak ada gambar</p>
        @endif

        <a href="{{ route('rekaps.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection