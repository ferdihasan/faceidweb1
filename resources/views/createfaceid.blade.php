{{-- {{ dd($karyawan->where('id', 1)) }} --}}
{{-- <?php echo $karyawan ?> --}}
@extends('layouts/main')
@section('container')
    <div class="row g-3">
        <div class="col-5 m-1" style="border: 1px solid black; border-radius: 5px; height: 500px">
            <form action="#" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <h4>Daftar Face ID Karyawan</h4>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="name">Nama</label>
                    <select name="name" id="name" class="form-control" aria-label="Default select example" onchange="onChangeSelect()">
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
                <div class="mb-3">
                    <label class="form-label" for="faceId">Face ID</label>

                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <div class="col m-1" style="border: 1px solid black; border-radius: 5px">
            <h1>test</h1>
        </div>
    </div>

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