@extends('layouts/main')
@section('none-container')
<div class="d-flex flex-row">

    @include('components/sidebar')
    
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
        <h1>Absensi Karyawan</h1>
        <hr>
        <div class="overflow-x-scroll" style="height: 80vh">
            <table class="table table-striped ">
                <thead class="align-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tanggal Absen</th>
                        <th scope="col">Waktu Masuk</th>
                        <th scope="col">Waktu Keluar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensi as $absen)
                        <tr>
                            <td>{{ $angka }}</td>
                            <td>{{ $absen->karyawan->name }}</td>
                            <td>{{ $absen->karyawan->nik }}</td>
                            <td>{{ $absen->tanggal_absen }}</td>
                            <td>{{ $absen->waktu_masuk }}</td>
                            <td>{{ $absen->waktu_keluar }}</td>
                            <td>
                                {{-- <a href="tambah-karyawan" data-bs-toggle="tooltip" data-bs-title="tambah" data-bs-placement="top"><i class="bi bi-plus-square"></i></a>  --}}
                                <div class="d-flex flex-row">
                                    <button class="btn">
                                        <a href="edit-absensi/{{ $absen->id }}"><i class="bi bi-pencil" style="color: green"></i></a> 
                                    </button>
                                    <form action="hapus-absensi/{{ $absen->id }}" method="post" onsubmit="return confirm(`Apakah ingin menghapus absensi karyawan {{ $absen->karyawan->name }} `)">
                                        @csrf
                                        <button class="btn" type="submit">
                                            <i class="bi bi-trash" style="color: red"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php $angka++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection