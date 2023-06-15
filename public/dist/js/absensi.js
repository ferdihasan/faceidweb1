
const video = document.getElementById('video');
//masukan data db ke js dan di parsing 
let dataFaceJson
let dataKaryawanJson
let labelHasil
function onLoadData(face, karyawan) {
    dataFaceJson = JSON.parse(face)
    dataKaryawanJson = JSON.parse(karyawan)
    //jika ingin memanggil data array harus melakukan parsing json lagi
    // console.log(JSON.parse(dataFaceJson[0].karyawan_id))
    // console.log(dataKaryawanJson)
    // let nama = dataKaryawanJson.find(value => value.id === JSON.parse(dataFaceJson[0].karyawan_id))
    // console.log(nama.name)
}


navigator.getUserMedia = ( navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

const startVideo = () => {
    navigator.getUserMedia(
        {video: {}},
        stream => video.srcObject = stream,
        err => console.error(err)
    )
}

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('dist/face-api.js/models'),
]).then(startVideo)


video.addEventListener('play', () => {
    let canvas = faceapi.createCanvasFromMedia(video)
    document.getElementById('container').appendChild(canvas)
    const displaySize = {width: video.width, height: video.height}
    faceapi.matchDimensions(canvas, displaySize)

    
    // membuat data sesuai format dari faceapi
    const labeledFaceDescriptors = []
    for (let i = 0; i < dataFaceJson.length; i++) {
        const data = dataKaryawanJson.find(value => value.id === JSON.parse(dataFaceJson[i].karyawan_id))

        // rubah dari array biasa menjadi float32Array
        const array1 = JSON.parse(dataFaceJson[i].faceid1)
        const array2 = JSON.parse(dataFaceJson[i].faceid2)
        // const float1 = new Float32Array(128)
        // const float2 = new Float32Array(128)
        const float1 = Float32Array.from(array1)
        const float2 = Float32Array.from(array2)
        // cek float32array
        // console.log(array1)
        // console.log(float1)
        // for (j = 0; j < 128; j++) {
        //     float1[j] = array1[j]
        //     float2[j] = array2[j]
        // }
        // memasukan data yang sesuai format ke array labeledFaceDescriptors
        labeledFaceDescriptors.push(new faceapi.LabeledFaceDescriptors(
            data.name,[ float1, float2,])
        )

    }
    //test variable
    // console.log(labeledFaceDescriptors)

    const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.5)
    // me load gambar
    setInterval(async () => {
        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors()
        const resizedDetections = faceapi.resizeResults(detections, displaySize)
        canvas.willReadFrequently = true;
        canvas.getContext('2d').clearRect(0,0, canvas.width, canvas.height)

        const results = resizedDetections.map(d => faceMatcher.findBestMatch(d.descriptor))
        results.forEach((result, i) => {
            const box = resizedDetections[i].detection.box
            const drawBox = new faceapi.draw.DrawBox(box, {label: result.toString()})
            drawBox.draw(canvas)
            labelHasil = drawBox.options.label

        })
    }, 100)

})




