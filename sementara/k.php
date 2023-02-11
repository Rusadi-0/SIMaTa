<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>SIMBT | Home</title>
  </head>
  <body>
<!-- START NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
<b  class="navbar-brand">SIM BUKU TAMU</b>
    </nav>
<!-- END NAVBAR -->

<!-- START MAIN -->
    <div class="container-sm">
        <div class="page mb-5">
            <div class="card mt-4 shadow-lg p-3 mb-5 bg-white rounded">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-arrow-down"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 5a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5A.5.5 0 0 1 8 5z" />
                        <path
                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg>

                    Isi Buku Tamu</h5>  
                <div class="card-body"> 
                    <form class="mt-3 pl-2" action="berhasil.php">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control shadow-sm bg-white " id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat /Instansi</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control shadow-sm bg-white" id="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ditemui" class="col-sm-3 col-form-label">Pihak yang ditemui</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control shadow-sm bg-white" id="ditemui">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keperluan" class="col-sm-3 col-form-label">Keperluan</label>
                            <div class="col-sm-7">
                                <textarea class="form-control shadow-sm bg-white" id="keperluan" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control shadow-sm bg-white" id="tanggal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-3 col-form-label">Jam ingin ditemui</label>
                            <div class="col-sm-7">
                                <input type="time" class="form-control shadow-sm bg-white" id="inputtext">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-3 col-form-label">Telepon</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control shadow-sm bg-white" id="inputtext">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary shadow-sm mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>

                                    Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- END MAIN -->

<!-- SCRIPT -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>