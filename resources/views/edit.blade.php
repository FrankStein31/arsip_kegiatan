@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Edit Rekap</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('rekaps.update', $rekap->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Input fields for other data -->
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $rekap->nama }}" required>
    </div>
    <div class="form-group">
        <label for="kegiatan">Kegiatan</label>
        <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{ $rekap->kegiatan }}" required>
    </div>
    <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $rekap->lokasi }}" required>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $rekap->tanggal }}" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $rekap->keterangan }}</textarea>
    </div>
    <div class="form-group">
        <label for="dokumentasi">Dokumentasi</label>
        <input type="file" class="form-control-file" id="dokumentasi" name="dokumentasi">
        @if($rekap->dokumentasi)
        <img src="{{ asset('storage/' . $rekap->dokumentasi) }}" alt="Dokumentasi" width="100">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection