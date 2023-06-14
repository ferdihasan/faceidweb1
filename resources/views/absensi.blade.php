@extends('layouts/main')
@section('container')

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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ferdi Hasan</td>
                            <td>07:50</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Roudhotul Jannah</td>
                            <td>07:48</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- membuat form hidden untuk di submit ke db --}}
    <form id="form" method="post">
        @csrf
        <input type="text" name="name" id="name">
        <input type="text" name="faceid" id="faceid">
        <input type="time" name="time" id="time">
    </form>

    {{-- <a onclick="onClickBtn()" class="btn btn-primary">tarik data</a> --}}

    {{-- Menggunakan library dari luar node_modules --}}
    <script defer src="dist/face-api.js/face-api.min.js"></script>
    <script defer src="dist/js/absensi.js" onload="onLoadData('{{ $faceid }}', '{{ $karyawan }}')"></script>
    <script defer src="dist/js/submitFormAbsensi"></script>


@endsection