<style>
    canvas {
        position: absolute;
    }
</style>
@extends('layouts/main')
@section('container')
    <h1>Absensi</h1>
    <video id="video" width="720" height="560" autoplay muted></video>

    <script src="/dist/js/absensi.js" type="module"></script>
    {{-- <script src="../js"></script> --}}
@endsection