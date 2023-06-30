{{-- {{ dd($absensi) }} --}}
@extends('layouts/main')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    
        body {
    
    
        }
    
        canvas {
            position: absolute;
            /* border: 1px solid black; */
            left: 128px;
            top: 117px;
        }
    </style>
@endsection
@section('container')
    <div class="d-flex row">
        <div class="col">
            <div class="d-flex justify-content-center">
                <h1>Absensi</h1>
            </div>
            <video id="video" width="720" height="560" autoplay muted></video>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center">
                <h1>Table absensi</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h5><?php echo date('l jS F Y') ?></h5>
            </div>
            <div class="overflow-y-scroll" style="height: 80vh">
                <table class="table table-striped">
                    <thead class="align-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jam</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($absensi as $a)
                        <tr>
                            <td>{{ $angka }}</td>
                            <td>{{ $a->karyawan->name }}</td>
                            <td>{{ $a->waktu_absen }}</td>
                        </tr>
                        <?php $angka++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- membuat form hidden untuk di submit ke db --}}
    <form action="submitAbsensiFaceId" id="form" method="POST">
        @csrf
        <input type="text" name="name" id="name" hidden>
        <input type="text" name="karyawan_id" id="karyawan_id" hidden>
        <button type="submit" id="button" hidden></button>
    </form>

    {{-- toast notifikasi --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-primary">
                <strong class="me-auto text-light">Alert</strong>
                <small class="text-light">1 detik yang lalu</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="toastBody" class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>

    {{-- <a onclick="onClickBtn()" class="btn btn-primary">tarik data</a> --}}

    {{-- Menggunakan library dari luar node_modules --}}
    <script defer src="dist/face-api.js/face-api.min.js"></script>
    <script defer src="dist/js/absensi.js" onload="onLoadData('{{ $faceid }}', '{{ $karyawan }}', '{{ $angka }}')"></script>
    <script defer src="dist/js/submitFormAbsensi.js" onload="onLoadDataAbsensi('{{ $absensi }}', {{ $jumlah_absensi }})"></script>


@endsection