// import * as faceapi from '../face-api.js'
// const faceapi = require('face-api.js')

const video = document.getElementById('video')
let detectionResult = null

// navigator usermedia has not supported
navigator.getUserMedia = ( navigator.getUserMedia ||
    navigator.webkitGetUserMedia ||
    navigator.mozGetUserMedia ||
    navigator.msGetUserMedia);

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('dist/face-api.js//models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('dist/face-api.js//models')
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
        // faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
        // console.log(detections)
        detectionResult = detections
    }, 100)
})

const onClickBtn = () => {
    console.log(detectionResult)
}

// console.log()





