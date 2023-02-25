<?php
$title = "Data Kunjungan";
$titleMenu = "Buku Tamu";

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


$qtamu = "SELECT * FROM `tb_tamu` ORDER BY `id` DESC";
$tamu = mysqli_query($conn, $qtamu);

$quser = "SELECT * FROM `tb_user`";
$user = mysqli_query($conn, $quser);
?>
<!-- Start Content -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Buku Tamu /</span> <?= $title; ?></h4>
<div class="row">
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Table Tamu</h5>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table id="myTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Aksi</th>
                <th scope="col">status</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">ditemui</th>
                <th scope="col">keperluan</th>
                <th scope="col">waktu</th>
                <th scope="col">nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($tamu as $t) : ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td>
                    <small style="opacity: 0;position: absolute;"><?= $t['tanggal']; ?></small>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <?php if ($t['status'] == 0) : ?>
                          <a class="dropdown-item btn-outline-primary" href="../data/kirim/index.php?id=<?= $t["id"]; ?>"><i class='bx bx-send'></i> <strong>Kirim</strong></a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $t['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapus<?= $t['id']; ?>"><i class="bx bx-trash me-1"></i>Hapus</a>
                        <?php elseif ($t['status'] == 1) : ?>
                          <a class="dropdown-item bg-label-warning" href="../data/ulang/index.php?id=<?= $t["id"]; ?>"><i class='bx bx-repeat'></i> <strong>Ulang</strong></a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $t['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                        <?php elseif ($t['status'] == 2) : ?>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $t['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                        <?php elseif ($t['status'] == 3) : ?>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $t['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                        <?php else : ?>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTop<?= $t['id']; ?>"><i class='bx bx-show'></i> Lihat foto</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapus<?= $t['id']; ?>"><i class="bx bx-trash me-1"></i>Hapus</a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </td>
                  <td>

                    <?php

                    if ($t['status'] == 0) {
                      echo '<span class="badge bg-label-info me-1">baru</span>';
                    }
                    if ($t['status'] == 1) {
                      echo '<span class="badge bg-label-warning me-1">Proses</span>';
                    }
                    if ($t['status'] == 2) {
                      echo '<span class="badge bg-label-success me-1">Diterima</span>';
                    }
                    if ($t['status'] == 3) {
                      echo '<span class="badge bg-label-primary me-1">Selesai</span>';
                    }
                    if ($t['status'] == 4) {
                      echo '<span class="badge bg-label-danger me-1">Ditolak</span>';
                    }

                    ?>

                  </td>
                  <td><?= $t['nama']; ?></td>
                  <td><?= $t['alamat']; ?></td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="
                      <?php
                      foreach ($user as $u) {
                        if ($u['id'] == $t['ditemui']) {
                          echo $u['image'];
                        }
                      }
                      ?>
                      ">
                        <img src="../bakso/assets/img/avatars/<?=$u['image'];?>" alt="Avatar" class="rounded-circle">
                      </li>
                    </ul>
                  </td>
                  <td>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <p class="dropdown-header">KEPERLUAN</p>
                      <button class="dropdown-item"><?= $t['keperluan']; ?></button>
                    </div>
                  </td>
                  <td>
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <p class="dropdown-header">WAKTU</p>
                      <button class="dropdown-item" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bxs-calendar-event'></i> <span>Tanggal</span>"><i class='bx bxs-date'></i><?= $t['tanggal']; ?></button>
                      <button class="dropdown-item" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-time-five' ></i> <span>Masuk</span>"><?= $t['masuk']; ?></button>
                      <button class="dropdown-item" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bxs-time-five' ></i> <span>Keluar</span>"><?php
                                                                                                                                                                                                                                        if ($t['keluar'] == NULL)
                                                                                                                                                                                                                                          echo "-";
                                                                                                                                                                                                                                        ?></button>
                    </div>
                  </td>
                  <td>
                    <?php
                    if ($t['nilai'] == NULL)
                      echo "-";
                    ?>
                  </td>
                </tr>
                <!-- START MODAL LIHAT FOTO -->
                <div class="modal fade" id="modalTop<?= $t['id']; ?>" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="container">
                          <img src="../img/<?= $t['gambar']; ?>" class="img-fluid rounded">
                        </div>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END MODAL LIHAT FOTO -->
                <!-- START MODAL HAPUS -->
                <div class="modal fade" id="hapus<?= $t['id']; ?>" data-bs-blackdrop="static" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Hapus data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-footer">
                        <form action="../data/hapus/index.php?id=<?= $t["id"]; ?>" method="post">
                          <input type="hidden" value="<?= $t['gambar']; ?>" name="hapusGmr" id="gambar1">
                          <a class="btn btn-outline-secondary" data-bs-dismiss="modal" href="javascript:void(0);"><i class="bx bx-undo me-1"></i> Batal</a>
                          <button type="submit" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Hapus</button>
                          <!-- <a class="btn btn-danger" href="../data/hapus/index.php?id=<?= $t["id"]; ?>"><i class="bx bx-trash me-1"></i> Hapus</a> -->
                        </form>
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