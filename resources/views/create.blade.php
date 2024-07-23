@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Tambah Rekap</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('rekaps.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Input fields for other data -->
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="form-group">
        <label for="kegiatan">Kegiatan</label>
        <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
    </div>
    <div class="form-group">
        <label for="dokumentasi">Dokumentasi</label>
        <input type="file" class="form-control-file" id="dokumentasi" name="dokumentasi" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection