@extends('layouts/main')
@section('none-container')
<style>

    body {


    }

    canvas {
        position: absolute;
        border: 1px solid black;
        left: 0;
    }
</style>
    <h1>Absensi</h1>
    <video id="video" width="720" height="560" autoplay muted></video>

    {{-- path di public/dist/js/absensi.js --}}
    {{-- path di resource/js/faceid.js --}}
    {{-- <script src="{{ asset('js/faceid.js') }}"></script> --}}

    {{-- <script src="../js"></script> --}}
    {{-- {{ $path = resource_path('js/faceid.js') }}
    <script src="{{ $path }}"></script> --}}

    {{-- <script type="module">
        import * as faceapi from 'face-api.js'
        console.log('test')
    </script> --}}

    {{-- Menggunakan library dari luar node_modules --}}
    <script defer src="dist/face-api.js/face-api.min.js"></script>
    {{-- <script defer src="dist/face-api.js/script.js"></script> --}}
    <script defer src="dist/js/absensi.js"></script>



@endsection