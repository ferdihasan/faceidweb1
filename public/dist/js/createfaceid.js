
const video = document.getElementById('video');

navigator.getUserMedia = ( navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('dist/face-api.js/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('dist/face-api.js/models')
]).then(startVideo);

// Promise.all([
//     nets.tinyFaceDetector.loadFromUri('dist/face-api.js/models'),
//     nets.faceLandmark68Net.loadFromUri('dist/face-api.js/models'),
//     nets.faceRecognitionNet.loadFromUri('dist/face-api.js/models')
// ]).then(startVideo);

const startVideo = () => {
    navigator.getUserMedia(
        {video: {}},
        stream => video.srcObject = stream,
        err => console.error(err)
    )
}
