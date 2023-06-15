@extends('layouts/main')
@section('none-container')
<div class="d-flex flex-row">

    @include('components/sidebar')
    
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
        <h1>Tambah Absensi</h1>
        <hr>
        <form action="form-tambah-absensi" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
            @csrf
            <div class="d-flex flex-row row">
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label class="form-label" for="name">Nama</label>
                        <select name="name" id="name" class="form-select" aria-label="Default select example" onchange="onChangeSelect()">
                            <option selected>Pilih Nama Karyawan</option>
                            @foreach ($karyawan as $name)
                                <option value="{{ $name->name }}">{{ $name->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="departemen" class="form-label">Departemen</label>
                        <input type="text" name="departemen" class="form-control" id="departemen" required readonly>
                    </div>
                </div>
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="tanggal_absen" class="form-label">Tanggal Absen</label>
                        <input type="date" name="tanggal_absen" class="form-control" id="tanggal_absen" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_absen" class="form-label">Waktu Absen</label>
                        <input type="time" name="waktu_absen" class="form-control" id="waktu_absen" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Tambah Absensi</button>
        </form>
    </div>
</div>

<script src="dist/js/tambah-absensi.js" onload="onLoadDataKaryawan('{{ $karyawan }}')"></script>
@endsection