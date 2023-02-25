<?php
$title = "Karyawan";
$titleMenu = "";

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
// sql menu
$qMenu = "SELECT * FROM `tb_menu`";
$menu = mysqli_query($conn, $qMenu);

// sql sub menu
$qSubMenu = "SELECT * FROM `tb_subMenu`";
$subMenu = mysqli_query($conn, $qSubMenu);
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="../dashboard/" class="app-brand-link">
      <i style="font-size: 35px;" class="bx bxs-book-reader app-brand-logo demo"></i>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">SIMa<span class="text-primary">Ta</span></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <?php foreach ($menu as $m) : ?>
      <?php if ($m['line'] != NULL) : ?>
        <li class="menu-header small text-uppercase">
          <span class="menu-header-text"><?= $m['line']; ?></span>
        </li>
      <?php endif; ?>
      <li class="menu-item <?php if ($title == $m['menu']) {
                              echo "active open";
                            }
                            elseif($titleMenu == $m['menu']){
                              echo "active open";
                            }
                             ?>">
        <a href="../<?php if ($m['sub'] == 1) {
                      echo "javascript:void(0);";
                    } else {
                      echo $m['url'];
                    }; ?>" class="menu-link <?php if ($m['sub'] == 1) {
                                                                                                                        echo "menu-toggle";
                                                                                                                      } ?>">
          <i class="menu-icon tf-icons <?= $m['icon']; ?>"></i>
          <div data-i18n="<?= $m['menu']; ?>"><?= $m['menu']; ?></div>
        </a>
        <?php if ($m['sub'] == 1) : ?>
          <ul class="menu-sub">
            <?php foreach ($subMenu as $s) : ?>
              <li class="menu-item <?php if ($title == $s['subMenu']) {
                                      echo "active";
                                    } ?>">
                <a href="../<?= $s['url']; ?>" class="menu-link">
                  <div data-i18n="Input"><?= $s['subMenu']; ?></div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>
<?php
echo $layoutTopbar;

if (isset($_POST["submit"])) {

  // cek apakah data berhasil di tambahkan atau tidak

  if (tambahKaryawan($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = '../karyawan';
    </script>
  ";
  } else {
    echo "
    <script>
      alert('data gagal ditambahkan!" . tambahKaryawan($_POST) . "');
      document.location.href = '../karyawan';
    </script>
  ";
  }
}


$query = "SELECT * FROM `tb_user`;";
$data = mysqli_query($conn, $query);
?>
<div style="position: fixed;z-index:9;top: -999999999999px;left:-999999999px;" class="mb-3 foto img-fluid" id="my_camera"></div>
<!-- Start Content -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span><?= $title; ?></h4>
<div class="row">
  <div class="col-xl-8">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Karyawan</h5>
        <!-- <small class="text-muted float-end">Merged input group</small> -->
      </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table id="myTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">NIP</th>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($data as $d) : ?>
                <?php if ($d['role'] > 2) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapus<?= $d['id']; ?>"><i class="bx bx-trash me-1"></i>Hapus</a>
                        </div>
                      </div>
                    </td>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['jabatan']; ?></td>
                    <td><?= $d['nip']; ?></td>
                  </tr>
                <? endif; ?>
                <!-- START MODAL HAPUS -->
                <div class="modal fade" id="hapus<?= $d['id']; ?>" data-bs-blackdrop="static" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Hapus data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                        <a class="btn btn-outline-secondary" data-bs-dismiss="modal" href="javascript:void(0);"><i class="bx bx-undo me-1"></i> Batal</a>
                        <a class="btn btn-danger" href="../karyawan/hapus/index.php?id=<?= $d["id"]; ?>"><i class="bx bx-trash me-1"></i> Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END MODAL HAPUS -->
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form Tambah Data</h5>
        <!-- <small class="text-muted float-end">Merged input group</small> -->
      </div>
      <div class="card-body">
        <form action="" id="form_id" class="mt-0 pl-2" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname">Nama</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-user"></i></span>
              <input required oninput="valInputKaryawan()" id="nama" name="nama" type="text" class="form-control" placeholder="Masukan Nama" aria-label="Masukan Nama" aria-describedby="nama">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">Jabatan</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class='bx bxs-user-badge'></i></span>
              <input required oninput="valInputKaryawan()" id="jabatan" name="jabatan" type="text" class="form-control" placeholder="Masukan Jabatan..." aria-label="JL.Ahmad Yani .." aria-describedby="basic-icon-default-company2">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company">NIP</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class='bx bx-italic'></i></span>
              <input required oninput="valInputKaryawan()" id="nip" name="nip" min="0" type="number" class="form-control" placeholder="Masukan NIP.." aria-label="" aria-describedby="basic-icon-default-company2">
            </div>
          </div>



          <input type="hidden" value="index.html" id="gambar" name="gambar">
          <button type="submit" id="rekam" disabled name="submit" class="btn btn-primary"><i class='bx bxs-save'></i> Rekam</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Content -->

<script src="../bakso/assets/js/js_me/script.js"></script>

<?php
echo $layoutFooter;
?>