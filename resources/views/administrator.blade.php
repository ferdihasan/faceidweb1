@extends('layouts/main')
@section('none-container')
<div class="d-flex flex-row">

    @include('components/sidebar')

    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 80vh">
        <h1>Daftar Karyawan</h1>
        <hr>
        <div class="overflow-x-scroll" style="height: 80vh">
            <table class="table table-striped" style="width:110%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $kar)
                        <tr>
                            <td>{{ $angka }}</td>
                            <td>{{ $kar->name }}</td>
                            <td>{{ $kar->email }}</td>
                            <td>{{ $kar->nik }}</td>
                            <td>{{ $kar->departemen }}</td>
                            <td>{{ $kar->alamat }}</td>
                            <td>{{ $kar->tanggal_lahir }}</td>
                            <td>{{ $kar->tanggal_join }}</td>
                            <td></td>
                        </tr>
                        <?php $angka++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection