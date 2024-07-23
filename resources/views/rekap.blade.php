@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Daftar Rekap</h1>

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
        <a href="{{ route('rekaps.create') }}" class="btn btn-primary mt-3">Tambah Rekap</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Dokumentasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekaps as $rekap)
                    <tr>
                        <td>{{ $rekap->id }}</td>
                        <td>{{ $rekap->nama }}</td>
                        <td>{{ $rekap->kegiatan }}</td>
                        <td>{{ $rekap->lokasi }}</td>
                        <td>{{ $rekap->tanggal }}</td>
                        <td>{{ $rekap->keterangan }}</td>
                        <td>
                            @if($rekap->dokumentasi)
                            <img src="{{ asset('storage/' . $rekap->dokumentasi) }}" alt="Dokumentasi" width="100">
                            @else
                            Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('rekaps.show', $rekap->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('rekaps.edit', $rekap->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rekaps.destroy', $rekap->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection