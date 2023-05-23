const video = document.getElementById('video')

        // navigator usermedia has not supported
        navigator.getUserMedia = ( navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia);

        function startVideo() {
            navigator.getUserMedia(
                {video: {}},
                stream => video.srcObject = stream,
                err => console.error(err)
            )
        }

        startVideo()
        console.log('ini skript')
        // const radio = 'ini adalah script'