<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <title>Document</title>
</head>
<style>
*{
	margin: 0;
	padding: 0;
	list-style: none;
	text-decoration: none;
	border: none;
	outline: none;
}
body { 
    font-family: "Gill Sans Extrabold", Helvetica, sans-serif
     
}

.container{
    text-align:center;
    
}
.row{
    margin: 20px;
}
.row2{
    text-align:center;
    margin: 20px;
}
.video{
    
}
.text{
    height: 50px;
    width: 500px;
    margin:10px;
    text-align: justify;
    background-color: yellow;
}
    

    </style>
<body>
<div class="container">
            <div class="row">
                <div class="video">
                <label>Escanea</label><br>
                    <video id="preview" width="50%"></video>
                </div>
                
                <div class="row2">
                <label>Resultados</label><br>                    
                    <input type="text" name="text" id="text" placeholder="scan qrcode" class="text">
                </div>
            </div>
        </div>

        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
           });

        </script>
</body>
</html>