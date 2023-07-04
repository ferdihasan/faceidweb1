@extends('layouts/main')
@section('head')
    <style>
        .alert-centered {
            position: absolute;
            left: 50%;
            y-index: +1;
            transform: translate(-50%, -50%);
        }
    </style>
@endsection
@section('none-container')
@if (session()->has('hapusFaceId'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('hapusFaceId') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@if (session()->has('errorHapusFaceId'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-x-circle-fill"> </i>{{ session('errorHapusFaceId') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
<div class="d-flex flex-row">

    @include('components/sidebar')
    
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
        <h1>Edit Karyawan</h1>
        <hr>
        <form action="form-edit-karyawan/{{ $karyawan->id }}" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
            @csrf
            <div class="d-flex flex-row row">
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required value="{{ $karyawan->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"  name="email" class="form-control" id="email" required value="{{ $karyawan->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" required value="{{ $karyawan->nik }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required value="{{ $karyawan->alamat }}">
                    </div>
                </div>
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="departemen" class="form-label">Departemen</label>
                            <select name="departemen" id="departemen" class="form-select" aria-label="Default select example">
                                <option value="{{ $karyawan->departemen }}" selected>Biarkan saja jika tidak dirubah</option>
                                <option value="finance">Finance</option>
                                <option value="it">IT</option>
                                <option value="logistic">Logistic</option>
                                <option value="procurement">Procurement</option>
                                <option value="produksi">Produksi</option>
                                <option value="warehouse">Warehouse</option>
                            </select>
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required value="{{ $karyawan->tanggal_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_join" class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tanggal_join" class="form-control" id="tanggal_join" required value="{{ $karyawan->tanggal_join }}">
                    </div>
                    <div class="mb-3">
                        <label for="faceid" class="form-label">Face ID</label>
                        <div class="d-flex flex-row">
                            <input style="width: 85%" type="text" name="faceid" class="form-control" id="faceid" readonly value="<?php echo $karyawan->faceid !== null ? 'Terdaftar' : 'Tidak Terdaftar' ?>">
                            @if ($karyawan->faceid !== null)
                                <a href="/hapus-faceid/{{ $karyawan->id }}" class="btn">
                                    <i class="bi bi-trash" style="color: red"></i>
                                </a>
                            @else
                                <a href="/createfaceid" class="btn">
                                    <i class="bi bi-pencil" style="color: green"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit" style="width: 20%">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection