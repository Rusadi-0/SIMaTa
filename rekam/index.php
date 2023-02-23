<?php
$home = "";
$rekam = "active";
$data = "";
$bukuTamu = "active open";

require '../functions.php';
require '../layouts/header.php';
require '../layouts/menu.php';
require '../layouts/topbar.php';
require '../layouts/footer.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ../");
  exit;
}
echo $layoutHeader;
echo $layoutMenu;
echo $layoutTopbar;

if (isset($_POST["submit"])) {

  // cek apakah data berhasil di tambahkan atau tidak

  if (tambah($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../rekam';
    </script>
  ";
  } else {
    echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = '../rekam';
    </script>
  ";
  }
}


$query = "SELECT * FROM `tb_ditemui`;";
$pilihDitemui = mysqli_query($conn, $query);
?>
<div style="position: fixed;z-index:9;top: -999999999999px;left:-999999999px;" class="mb-3 foto img-fluid" id="my_camera"></div>
<!-- Start Content -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku Tamu /</span> Rekam Tamu Masuk</h4>
<div class="row">
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card">
      <div class="foto" id="results">
        <img class="card-img-top" src="../bakso/assets/img/elements/index.png" alt="Card image cap">
      </div>
      <div class="card-body">
        <h5 class="card-title">Kamera</h5>
        <p class="card-text">
        </p>
        <form action="../unlink.php" method="post">
          <div class="tab-pane fade show active">
            <button type="button" id="ambil" onclick="take_snapshot()" class="btn btn-outline-primary mt-1"><i class='bx bxs-camera'></i> Ambil Gambar</button>
            <input type="hidden" value="" name="hapusGmr" id="gambar1">
            <button id="reset" type="submit" disabled class="btn btn-outline-danger mt-1"><i class='bx bx-reset'></i> Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xl col-md-6 col-lg-8">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form Rekam Tamu</h5>
        <!-- <small class="text-muted float-end">Merged input group</small> -->
      </div>
      <div class="card-body">
        <form action="" id="form_id" class="mt-0 pl-2" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Nama</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-user"></i></span>
              <input required oninput="valInput()" autofocus id="nama" name="nama" type="text" class="form-control" placeholder="John Doe" aria-label="John Doe" aria-describedby="nama">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">Alamat</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-buildings"></i></span>
              <input required oninput="valInput()" id="alamat" name="alamat" type="text" class="form-control" placeholder="JL.Ahmad Yani .." aria-label="JL.Ahmad Yani .." aria-describedby="basic-icon-default-company2">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6">
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Ditemui</label>
                <select name="ditemui" required oninput="valInput()" id="ditemui" class="form-select" aria-label="Default select example">
                  <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <option selected="" value=""> - pilih - </option>
                  <?php foreach ($pilihDitemui as $pt) : ?>
                    <option value="<?= $pt['nama']; ?>"><?= $pt['jabatan']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Tanggal</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-calendar'></i></span>
                  <input required oninput="valInput()" id="tanggal" name="tanggal" type="date" class="form-control phone-mask" value="<?= date("Y-m-d", time()); ?>" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-message">Keperluan</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-comment"></i></span>
              <textarea required oninput="valInput()" id="keperluan" name="keperluan" class="form-control" placeholder="Isi di sini dan tanyakan dengan jelas Keperluan ingin bertamu.." aria-label=""></textarea>
            </div>
          </div>


          <input type="hidden" value="index.html" id="gambar" name="gambar">
          <button type="submit" id="rekam" disabled name="submit" class="btn btn-primary"><i class='bx bxs-save'></i> Rekam</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Content -->
<!-- <script>
  document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 116) {
      // document.location.href = "../unlink.php";
      alert("no f5");
    };
  };
</script> -->
<script src="../webcamjs/webcam.min.js"></script>
<script src="../bakso/assets/js/js_me/script.js"></script>

<?php
echo $layoutFooter;
?>