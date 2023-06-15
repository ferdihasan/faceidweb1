const form = document.getElementById('form')
const name = document.getElementById('name')
const karyawan_id = document.getElementById('karyawan_id')
const tanggal = document.getElementById('tanggal')
const waktu = document.getElementById('waktu')
const button = document.getElementById('button')
const tbody  = document.getElementById('tbody')
let formId
let formName

//membuat kondisi jika hasil pengenalan tidak sama dengan unknown
setInterval(() => {
    // mengecek apakah var label hasil tidak sama dengan undefined
    if (labelHasil !== undefined) {
        if (labelHasil.split(" ")[0] !== "unknown"){
            // menghapus (x.x) pada label hasil
            const arrayLabel = labelHasil.split(" ")
            arrayLabel.pop()
            // nama label yang dikenali
            const labelName = arrayLabel.join(" ")
            // memasukan data pengenalan ke form
            const karyawan = dataKaryawanJson.find(value => value.name === labelName)
            name.value = labelName
            karyawan_id.value = karyawan.id
            formId = karyawan_id
            formName = labelName
            // untuk mensubmit form
            button.click()
        }
        else {
            alert('data unknown')
        }
    }
},10000)
// funciton event listener submit
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
        // create element
        const row = document.createElement('tr')
        const cellNumber = document.createElement('td')
        const cellNama = document.createElement('td')
        const cellWaktu = document.createElement('td')
        const time = new Date()
        // memasukan variable ke element
        cellNumber.textContent = 3
        cellNama.textContent = formName
        cellWaktu.textContent = `${time.getHours()}:${time.getMinutes()}:${time.getSeconds()}`
        // memasukan variable cell ke element row
        row.appendChild(cellNumber)
        row.appendChild(cellNama)
        row.appendChild(cellWaktu)
        // memasukan variable row ke tbody
        tbody.appendChild(row)

        console.log(data)
    })
    .catch(err => {
        // menangani data error
        console.log(err)
    })

})
