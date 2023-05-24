@extends('layouts/main')
@section('none-container')
<div class="d-flex flex-row">

    @include('components/sidebar')
    
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
        <h1>Tambah Karyawan</h1>
        <hr>
        <form action="form-tambah-karyawan" method="post" onsubmit="return confirm('Apakah anda yakin data yang anda masukan sudah benar?')">
            @csrf
            <div class="d-flex flex-row row">
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"  name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" id="nik" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                </div>
                <div class="d-flex flex-column col-3">
                    <div class="mb-3">
                        <label for="departemen" class="form-label">Departemen</label>
                            <select name="departemen" id="departemen" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Departemen</option>
                                <option value="finance">Finance</option>
                                <option value="produksi">Produksi</option>
                                <option value="procurement">Procurement</option>
                                <option value="warehouse">Warehouse</option>
                                <option value="logistic">Logistic</option>
                            </select>
                        </input>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_join" class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tanggal_join" class="form-control" id="tanggal_join" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Tambah Karyawan</button>
        </form>
    </div>
</div>
@endsection