<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="onLoad('{{ $faceid1 }}')">
    <h1>Test Absen</h1>
    <p id="p" >value</p>

    <a href="#" onclick="onClickBtn('{{ $faceid1 }}')">tekan disini</a>
    <script>
        const p = document.getElementById('p')
        let dbFaceId = new Float32Array(128)
        
        

        const onLoad = value => {
            // const db = new Array.push(parseFloat(value))
            const db = JSON.parse(value)
            for (let i = 0; i < 128;i++){
                dbFaceId[i] = db[i]
            }

            console.log(dbFaceId)
        }

        function onClickBtn(value){
            
            console.log(dbFaceId)
        }
    </script>
</body>
</html>