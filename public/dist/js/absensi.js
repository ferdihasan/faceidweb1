
const video = document.getElementById('video');
let dataJson
function onLoadData(data) {
    dataJson = JSON.parse(data)
    // console.log(dataJson)
}


navigator.getUserMedia = ( navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('dist/face-api.js/models'),
]).then(startVideo);

const startVideo = () => {
    navigator.getUserMedia(
        {video: {}},
        stream => video.srcObject = stream,
        err => console.error(err)
    )
}

video.addEventListener('play', () => {
    let canvas = faceapi.createCanvasFromMedia(video)
    document.body.appendChild(canvas)
    const displaySize = {width: video.width, height: video.height}
    faceapi.mathDimensions(canvas, displaySize)

    // rubah dari array biasa menjadi float32Array
    const array1 = new Float32Array(128)
    const array2 = new Float32Array(128)
    for (i = 0; i < 128; i++) {
        array1[i] = dataJson[i]
        array2[i] = dataJson[i]
    }
    
})


