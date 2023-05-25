<style>
    canvas {
        position: absolute;
    }
</style>
@extends('layouts/main')
@section('container')
    <h1>Absensi</h1>
    <video id="video" width="720" height="560" autoplay muted></video>

    {{-- path di public/dist/js/absensi.js --}}
    <script src="dist/js/absensi.js"></script>
    {{-- path di resource/js/faceid.js --}}
    {{-- <script src="{{ asset('js/faceid.js') }}"></script> --}}

    {{-- <script src="../js"></script> --}}
    {{-- {{ $path = resource_path('js/faceid.js') }}
    <script src="{{ $path }}"></script> --}}

    {{-- <script type="module">
        import * as faceapi from 'face-api.js'
        console.log('test')
    </script> --}}

@endsection