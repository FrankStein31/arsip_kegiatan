@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">History Rekap</h1>

<form method="GET" action="{{ route('history') }}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="search">Cari:</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Cari berdasarkan nama, kegiatan, lokasi, atau keterangan">
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="form-group">
                <label for="date">Tanggal:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="start_date">Dari Tanggal:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="end_date">Sampai Tanggal:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="{{ route('history') }}" class="btn btn-secondary ml-2">Reset</a>
    </div>
</form>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Rekap Kegiatan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Dokumentasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekaps as $rekap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rekap->nama }}</td>
                        <td>{{ $rekap->kegiatan }}</td>
                        <td>{{ $rekap->lokasi }}</td>
                        <td>{{ $rekap->tanggal }}</td>
                        <td>{{ $rekap->keterangan }}</td>
                        <td>
                            @if ($rekap->dokumentasi)
                            <img src="{{ asset('storage/' . $rekap->dokumentasi) }}" alt="Dokumentasi" width="100">
                            @else
                            Tidak ada gambar
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection