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
@if (session()->has('hapus'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@if (session()->has('tambah'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('tambah') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@if (session()->has('update'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('update') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@if (session()->has('save_faceid'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('save_faceid') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif
@if (session()->has('loginSuccess'))
    <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
        <i class="bi bi-check-circle-fill"> </i>{{ session('loginSuccess') }}
        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
    </div>
@endif

<div class="d-flex flex-row">
    
    @include('components/sidebar')
    
    <div class="d-flex flex-column bg-body-tertiary p-3 m-1 rounded-3 shadow" style="width:100%; height: 88vh">
        <h1>Daftar Karyawan</h1>
        <hr>
        <div class="overflow-x-scroll" style="height: 80vh">
            <table class="table table-striped " style="width:110%">
                <thead class="align-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Face ID</th>
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
                            <td><?php echo $kar->faceid !== null ? 'Terdaftar' : 'Tidak terdaftar'  ?></td>
                            <td>
                                {{-- <a href="tambah-karyawan" data-bs-toggle="tooltip" data-bs-title="tambah" data-bs-placement="top"><i class="bi bi-plus-square"></i></a>  --}}
                                <div class="d-flex flex-row">
                                    <form action="edit-karyawan/{{ $kar->id }}" method="post">
                                        @csrf
                                        <button class="btn" type="submit">
                                            <i class="bi bi-pencil" style="color: green"></i>
                                        </button>
                                    </form>
                                    <form action="hapus-karyawan/{{ $kar->id }}" method="post" onsubmit="return confirm(`Apakah ingin menghapus karyawan {{ $kar->name }} `)">
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