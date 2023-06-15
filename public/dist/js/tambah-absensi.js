const name = document.getElementById('name')
const nik = document.getElementById('nik')
const departemen = document.getElementById('departemen')
let karyawan
onLoadDataKaryawan = data => karyawan = JSON.parse(data)

onChangeSelect = () => {
    const selected = karyawan.find(k => k.name === name.value)
    nik.value = selected.nik
    departemen.value = selected.departemen
}