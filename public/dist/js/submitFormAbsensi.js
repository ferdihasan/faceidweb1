const form = document.getElementById('form')
const name = document.getElementById('name')
const karyawan_id = document.getElementById('karyawan_id')
const tanggal = document.getElementById('tanggal')
const waktu = document.getElementById('waktu')
const button = document.getElementById('button')
let absensi

// onload array absensi
function onLoadDataAbsensi(value) {
    absensi = JSON.parse(value)
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
        // {
        //     'karyawan_id': formId,
        //     'name': formName
        // }
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

        // ambil data absensi terbaru
        absensi = data.absensi
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
            //validasi apakah variable absensi tidak undefined
            if (absensi !== undefined) {
                // validasi untuk absen 1 jam hanya boleh 1 kali absen
                for (let i = 0; i< absensi.length; i++) {
                    const mulaiAbsen = parseInt(absensi[i].waktu_absen.split(':')[0])
                    const akhirAbsen = mulaiAbsen + 3
                    const kar = dataKaryawanJson.find(value => value.id === parseInt(absensi[i].karyawan_id))
                    const now = new Date()
                    const jam = now.getHours()
                    // console.log(jam)
                    // console.log(mulaiAbsen)
                    // console.log(akhirAbsen)
                    if(labelName === kar.name) {
                        if (jam >= mulaiAbsen && jam <= akhirAbsen ) {
                            alert('data yang di input sudah tersedia')
                        }
                        else {
                            submitButton()
                            alert('data yang di input belum tersedia')
                        }
                    }
                    else {
                        // submitButton
                        console.log(typeof jam)
                        console.log(jam)
                        console.log(absensi)
                        // alert('alert 3')
                    }
                }
            }
            else {
                // console.log(absensi)
                // console.log(absensi[0].waktu_absen.split(':')[0])
                submitButton()
                console.log('tugas telah selesai dijalankan')
            }
        }
    }
},3000) // jarak tiap submit 3 detik satuan ms
