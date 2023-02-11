<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to capture picture from webcam with Webcam.js</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>


	<!-- -->
	<!-- <input type="hidden" id="my_camera"> -->
    <div class="foto" id="results"  ></div>
	<div type="button"id="my_camera"></div>
	<!-- <input type=button value="Configure" onClick="configure()"> -->
	<input type=button value="Take Snapshot" onClick="take_snapshot()">
	<input type=button value="reset" onClick="adi_rahman()">
<div id="demo"></div>

	
	
	<!-- Script -->
	<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		Webcam.set({
				width: 320,
				height: 240,
				image_format: 'jpeg',
				jpeg_quality: 90
			});
			Webcam.attach( '#my_camera' );
		// Configure a few settings and attach camera
		function configure(){
			
		}
		// A button for taking snaps
		

		// preload shutter audio clip
		var shutter = new Audio();
		shutter.autoplay = false;
		shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

		function take_snapshot() {
			// play sound effect
			shutter.play();

			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<img id="imageprev" src="'+data_uri+'"/>';
			} );
						var base64image = document.getElementById("imageprev").src;

			Webcam.upload(base64image, 'upload.php', function (code, text) {
				document.getElementById("demo").innerHTML = '<p id="berhasil">Berhasil disimpan..!!</p><p id="ucuk">'+text+'</p>';
				//console.log(text);
			});
			// var ol = document.getElementById("imageprev");
			// ol.remove();

			// Webcam.reset();
			
		}
		function adi_rahman() {
			var ol = document.getElementById("imageprev");
			ol.remove();

			var p = document.getElementById("berhasil");
			p.remove();
			var p = document.getElementById("ucuk");
			p.remove();
			
		}
		// function saveSnap(){
		// 	// Get base64 value from <img id='imageprev'> source
		// 	var base64image =  document.getElementById("imageprev").src;

		// 	 Webcam.upload( base64image, 'upload.php', function(code, text) {
		// 		 document.getElementById("demo").innerHTML = text;
		// 		 //console.log(text);
        //     });
		// 	var ol = document.getElementById("imageprev");
		// 	ol.remove();

		// }
	</script>
	
</body>
</html>
