{{-- {{ dd($karyawan->where('id', 1)) }} --}}
{{-- <?php echo $karyawan ?> --}}
@extends('layouts/main')
<style>
    canvas {
        position: absolute;
        top: 100px;
        /* border: 1px solid black; */
        right: 260px
    }
</style>
@section('container')
    <div class="row g-3">
        <div class="col-5 m-1 shadow" style="border-radius: 5px; height: 500px">
            <form action="#" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <h4>Daftar Face ID Karyawan</h4>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <select name="name" id="name" class="form-select" aria-label="Default select example" onchange="onChangeSelect()">
                        <option selected>Pilih Nama Karyawan</option>
                        @foreach ($karyawan as $name).
                            <option value="{{ $name->name }}">{{ $name->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nik">NIK</label>
                    <input class="form-control" type="text" id="nik" name="nik" >
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emailFaceId">Email</label>
                    <input class="form-control" type="text" id="emailFaceId" name="emailFaceId" unique readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="departemen">Departemen</label>
                    <input class="form-control" type="text" id="departemen" name="departemen" readonly>
                </div>
            </form>
        </div>
        <div class="col m-1 shadow" style="border-radius: 5px">
            <div class="d-flex justify-content-center">
                <h3>Face ID</h3>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <video id="video" height="320px" width="480px" autoplay muted></video>
            </div>
            <div class="mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Save Face ID</button>
            </div>
        </div>
    </div>

    <script defer src="dist/face-api.js/face-api.min.js"></script>
    <script defer src="dist/js/createfaceid.js"></script>

    <script type="text/javascript">
        const onLoadEmail = () => {
            const email = document.getElementById('email')
            email.value = 'ferdihasanpwd@gmail.com'
        }

        const karyawan = <?php echo $karyawan ?>

        // console.log(karyawan)
        const onChangeSelect = () => {
            const select = document.getElementById('name')
            const nik = document.getElementById('nik')
            const email = document.getElementById('emailFaceId')
            const departemen = document.getElementById('departemen')
            
            const selected = karyawan.find(user => user.name == select.value)

            // console.log(select.value)
            // console.log(selected)
            nik.value = selected.nik
            email.value = selected.email
            departemen.value = selected.departemen

        }

    </script>
@endsection