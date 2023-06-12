@extends('layouts/main')
@section('container')

<style>

    body {


    }

    canvas {
        position: absolute;
        border: 1px solid black;
        left: 128px;
        top: 117px;
    }
</style>
    <h1>Absensi</h1>
    <video id="video" width="720" height="560" autoplay muted></video>

    <a onclick="onClickBtn()" class="btn btn-primary">tarik data</a>

    {{-- Menggunakan library dari luar node_modules --}}
    <script defer src="dist/face-api.js/face-api.min.js"></script>
    <script defer src="dist/js/absensi.js" onload="onLoadData('{{ $faceid }}', '{{ $karyawan }}')"></script>



@endsection