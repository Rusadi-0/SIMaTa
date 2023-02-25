<?php
$title = "Dashboard";
$titleMenu = "";


require '../functions.php';
require '../layouts/header.php';
require '../layouts/menu.php';
require '../layouts/topbar.php';
require '../layouts/footer.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ./home/");
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
?>
<!-- Start Content -->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span><?= $title; ?></h4>
<!-- End Content -->

<?php
echo $layoutFooter;
?>