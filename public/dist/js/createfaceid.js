const video = document.getElementById('video')
const faceid = document.getElementById('faceid')
const select = document.getElementById('name')
const nik = document.getElementById('nik')
const email = document.getElementById('emailFaceId')
const departemen = document.getElementById('departemen')
const form = document.getElementById('form')
// memasukan data dari db php ke js
const karyawan = []
function onLoadDataDbKaryawan(value) {
    const dataJson = JSON.parse(value)
    for (let i = 0; i < dataJson.length; i++) {
        karyawan.push(dataJson[i])
    }
}

const onChangeSelect = () => {
    const selected = karyawan.find(user => user.name == select.value)
    nik.value = selected.nik
    email.value = selected.email
    departemen.value = selected.departemen
    form.setAttribute('action', `createfaceid/${selected.id}`)
}

// navigator usermedia has not supported
navigator.getUserMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);
// meload resource face-api.js
Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('dist/face-api.js/models'),
]).then(startVideo);

function startVideo() {
    navigator.getUserMedia(
        {video: {}},
        stream => video.srcObject = stream,
        err => console.error(err)
    )
}

video.addEventListener('play', () => {
    const canvas = faceapi.createCanvasFromMedia(video)
    document.body.append(canvas)
    const displaySize = {width: video.width, height: video.height}
    faceapi.matchDimensions(canvas, displaySize)
    setInterval(async () => {

        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors()
        const resizedDetections = faceapi.resizeResults(detections, displaySize)
        canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
        faceapi.draw.drawDetections(canvas, resizedDetections)
        const array = resizedDetections[0].descriptor
        faceid.value = `[${array}]`
    }, 100)
})





