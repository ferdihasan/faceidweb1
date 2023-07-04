const form = document.getElementById('form')
const name = document.getElementById('name')
const karyawan_id = document.getElementById('karyawan_id')
const tanggal = document.getElementById('tanggal')
const waktu = document.getElementById('waktu')
const button = document.getElementById('button')
const liveToast = document.getElementById('liveToast')
const toastBody = document.getElementById('toastBody')
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(liveToast)
let absensi = []
let jumlahAbsensi
// untuk menyimpan variable array yang pertama di ambil
let allFirstMatches = []
// onload array absensi
function onLoadDataAbsensi(value, jmlAbsensi) {
    absensi = JSON.parse(value)
    jumlahAbsensi = jmlAbsensi
}
// function event listener submit
form.addEventListener('submit', event => {
    // untuk membuat agar web tidak mereload jika di submit
    event.preventDefault()
    // ngambil data dari form
    const formData = new FormData(form)
    // console.log(formData)
    // fetching data
    fetch('submitAbsensiFaceId',{
        method: 'post',
        headers: {
            //perlu di kasih atribut csrf supaya tidak error saat submit
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: 
        formData
    })
    .then(res => {
        if (res.ok){
            //mengubah data yang di submit

            return res.json();
            // console.log(res)
        }
        throw new Error(res.status)
    })
    .then(data => {
        // menangani data respon dari server
        // untuk mereset ketika selesai absensi
        allFirstMatches = []
        // ambil data absensi terbaru
        absensi.push(data.absensi[jumlahAbsensi])
        // console.log(absensi)
        // create element
        const tbody  = document.getElementById('tbody')
        const row = document.createElement('tr')
        const cellNumber = document.createElement('td')
        const cellNama = document.createElement('td')
        const cellWaktu = document.createElement('td')
        // memasukan variable ke element
        cellNumber.textContent = nomorTable
        nomorTable++
        cellNama.textContent = data.name
        cellWaktu.textContent = data.waktu
        // memasukan variable cell ke element row
        row.appendChild(cellNumber)
        row.appendChild(cellNama)
        row.appendChild(cellWaktu)
        // memasukan variable row ke tbody
        tbody.appendChild(row)
        // console.log(data)
    })
    .catch(err => {
        // menangani data error
        console.log(err)
    })
})

//membuat kondisi jika hasil pengenalan tidak sama dengan unknown
setInterval(() => {
    // mengecek apakah var label hasil tidak sama dengan undefined
    if (labelHasil !== undefined) {
        if (labelHasil.split(" ")[0] !== "unknown"){
            // menghapus (x.x) pada label hasil "label nama (x.x)"
            const arrayLabel = labelHasil.split(" ")
            arrayLabel.pop()
            // nama label yang dikenali
            const labelName = arrayLabel.join(" ")
            //function untuk submit form
            const submitButton = () => {
                // memasukan data pengenalan ke form
                const karyawan = dataKaryawanJson.find(value => value.name === labelName)
                name.value = labelName
                karyawan_id.value = karyawan.id
                // untuk mensubmit form
                button.click()
            }
            //toast notifikasi ketika absensi
            const toastAlert = (value) => {
                toastBody.innerText = value
                toastBootstrap.show()
            }
            // untuk memasukan data array yang ditemukan pertama kali
            const firstMatch  = {}
            if (absensi.length > 0) {
                // melooping dari LIFO data
                for (let i = absensi.length; i > 0; i--) {
                    const { karyawan_id } = absensi[i - 1]
                    // jika karyawan_id belum ada di variable firstmatch
                    if (!firstMatch[karyawan_id]){
                        firstMatch[karyawan_id] = absensi[i - 1]
                    }
                }
            }
            else if (absensi.length === 0) {
                submitButton()
                toastAlert(`${labelName} berhasil melakukan absensi`)
            }
            // untuk memasukan data array yang ditemukan
            allFirstMatches = Object.values(firstMatch)
            //validasi apakah variable absensi tidak undefined
            if (allFirstMatches.length > 0) {
                // validasi untuk absen 1 jam hanya boleh 1 kali absen
                const kar = dataKaryawanJson.find(value => value.name === labelName)
                const absen = allFirstMatches.find(value => parseInt(value.karyawan_id) === kar.id)
                if (absen !== undefined) {
                    const mulaiAbsen = parseInt(absen.waktu_absen.split(':')[0])
                    const akhirAbsen = mulaiAbsen + 3
                    const jam = new Date()
                    const now = jam.getHours()
                    if (now >= mulaiAbsen && now <= akhirAbsen) {
                        toastAlert(`${labelName} sudah melakukan absensi`)
                    }
                    else {
                        submitButton()
                        toastAlert(`${labelName} berhasil melakukan absensi`)
                    }
                }
                else {
                    submitButton()
                    toastAlert(`${labelName} berhasil melakukan absensi`)
                }
            }
        }
    }
},3000) // jarak tiap submit 3 detik satuan ms
