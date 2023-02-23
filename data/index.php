<?php
$home = "";
$rekam = "";
$data = "active";
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


$query = "SELECT * FROM `tb_tamu` ORDER BY `id` DESC";
$data = mysqli_query($conn, $query);
echo $_SERVER['DOCUMENT_ROOT'];
?>
<!-- Start Content -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku Tamu /</span> Data Kunjungan</h4>
<div class="row">
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Hoverable rows</h5>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table id="myTable" class="table table-hover table-striped table-borderless">
            <thead>
              <tr>
                <th scope="col">Aksi</th>
                <th scope="col">status</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">ditemui</th>
                <th scope="col">keperluan</th>
                <th scope="col">tanggal</th>
                <th scope="col">masuk</th>
                <th scope="col">keluar</th>
                <th scope="col">telepon</th>
                <th scope="col">nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $d) : ?>
                <tr>
                  <td>
                  <small style="opacity: 0;position: absolute;"><?=$d['status'];?></small>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <?php if ($d['status'] == 0) : ?>
                          <a class="dropdown-item btn-outline-primary" href="../data/kirim/index.php?id=<?= $d["id"]; ?>"><i class='bx bx-send'></i> <strong>Kirim</strong></a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $d['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapus<?= $d['id']; ?>"><i class="bx bx-trash me-1"></i>Hapus</a>
                        <?php elseif ($d['status'] == 1) : ?>
                          <a class="dropdown-item bg-label-warning" href="../data/ulang/index.php?id=<?= $d["id"]; ?>"><i class='bx bx-repeat'></i> <strong>Ulang</strong></a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $d['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                        <?php elseif ($d['status'] == 2) : ?>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $d['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                        <?php elseif ($d['status'] == 3) : ?>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $d['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                        <?php else : ?>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $d['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapus<?= $d['id']; ?>"><i class="bx bx-trash me-1"></i>Hapus</a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </td>
                  <td>

                    <?php

                    if ($d['status'] == 0) {
                      echo '<span class="badge bg-label-info me-1">baru</span>';
                    }
                    if ($d['status'] == 1) {
                      echo '<span class="badge bg-label-warning me-1">Proses</span>';
                    }
                    if ($d['status'] == 2) {
                      echo '<span class="badge bg-label-success me-1">Diterima</span>';
                    }
                    if ($d['status'] == 3) {
                      echo '<span class="badge bg-label-primary me-1">Selesai</span>';
                    }
                    if ($d['status'] == 4) {
                      echo '<span class="badge bg-label-danger me-1">Ditolak</span>';
                    }

                    ?>

                  </td>
                  <td><?= $d['nama']; ?></td>
                  <td><?= $d['alamat']; ?></td>
                  <td><?= $d['ditemui']; ?></td>
                  <td><?= $d['keperluan']; ?></td>
                  <td><?= $d['tanggal']; ?></td>
                  <td><?= $d['masuk']; ?></td>
                  <td><?= $d['keluar']; ?></td>
                  <td><?= $d['telepon']; ?></td>
                  <td><?= $d['nilai']; ?></td>
                </tr>
                <!-- START MODAL LIHAT FOTO -->
                <div class="modal fade" id="modalTop<?= $d['id']; ?>" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <img src="../img/<?= $d['gambar']; ?>" class="img-fluid rounded">
                        </div>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END MODAL LIHAT FOTO -->
                <!-- START MODAL HAPUS -->
                <div class="modal fade" id="hapus<?= $d['id']; ?>" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel"><strong><?=$d['nama'];?></strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="container text-center">
                          <a class="btn btn-label-secondary bg-label-secondary" data-bs-dismiss="modal" href="javascript:void(0);"><i class="bx bx-undo me-1"></i> Kembali</a>
                          <a class="btn btn-danger" href="../data/hapus/index.php?id=<?= $d["id"]; ?>"><i class="bx bx-trash me-1"></i> Hapus</a>
                        </div>
                      </div>
                      <div class="modal-footer">
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
</div>

<!-- End Content -->

<?php
echo $layoutFooter;
?>