Webcam.set({
    // width: 3840,
    // height: 2160,
    // width: 1280,
    // height: 800,
    // width: 1024,
    // height: 768,
    // width: 824,
    // height: 468,
    width: 420,
    height: 300,
    
    
    image_format: 'jpg',
    jpeg_quality: 900000
  });
  Webcam.attach('#my_camera');
  // Configure a few settings and attach camera
  // A button for taking snaps


  // preload shutter audio clip
  // var shutter = new Audio();
  // shutter.autoplay = false;
  // shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

  function take_snapshot() {
    // play sound effect
    // shutter.play();

    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
      // display results in page
      document.getElementById('results').innerHTML =
        '<img id="imageprev" class="card-img-top" src="' + data_uri + '"/>';
    });
    var base64image = document.getElementById("imageprev").src;

    Webcam.upload(base64image, '/upload.php', function(code, text) {
      // pesan berhasil
      document.getElementById("gambar").value = text;
      document.getElementById("gambar1").value = text;
      document.getElementById("ambil").setAttribute("disabled", true);  
      document.getElementById('reset').disabled = false;
    });
    // var ol = document.getElementById("imageprev");
    // ol.remove();

    // Webcam.reset();

  }
  function valInput() {
    let nama = document.getElementById("nama").value.length;
    let alamat = document.getElementById("alamat").value.length;
    let ditemui = document.getElementById("ditemui").value.length;
    let tanggal = document.getElementById("tanggal").value.length;
    let keperluan = document.getElementById("keperluan").value.length;
    
    if(keperluan == 0 || tanggal == 0 || ditemui == 0 || alamat == 0 || nama == 0){
      document.getElementById("rekam").setAttribute("disabled", true);
    
    } else {
    document.getElementById("rekam").disabled = false;
    }
  }
  
  function klikRekam(){
    document.getElementById('rekam').setAttribute('disabled', true);
    document.getElementById('rekam').innerHTML = `<i class='bx bx-loader bx-spin'></i> Merekam`;
  }


    document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 119) {
        take_snapshot();
        document.getElementById("ambil").setAttribute("disabled", true);  
      document.getElementById('reset').disabled = false;
    };
  };


