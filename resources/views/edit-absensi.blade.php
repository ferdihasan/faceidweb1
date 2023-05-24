@extends('layouts/main')
@section('none-container')
<div class="d-flex flex-row">

    @include('components/sidebar')
    
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
        <h1>Edit Absensi</h1>
        <hr>
        <form action="form-edit-absensi/{{ $absensi->id }}" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
            @csrf
            <div class="d-flex flex-row row">
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required value="{{ $absensi->karyawan->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" required value="{{ $absensi->karyawan->nik }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_absen" class="form-label">Tanggal Absen</label>
                        <input type="date" name="tanggal_absen" class="form-control" id="tanggal_absen" required value="{{ $absensi->tanggal_absen }}">
                    </div>
                </div>
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                        <input type="time" name="waktu_masuk" class="form-control" id="waktu_masuk" required value="{{ $absensi->waktu_masuk }}">
                    </div>
                    <div class="mb-3">
                        <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                        <input type="time" name="waktu_keluar" class="form-control" id="waktu_keluar" required value="{{ $absensi->waktu_keluar }}">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Simpan Absensi</button>
        </form>
    </div>
</div>
@endsection