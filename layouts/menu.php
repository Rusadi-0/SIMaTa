<?php

$layoutMenu = '

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="../home/" class="app-brand-link">
              <img class="app-brand-logo demo shadow-sm rounded-circle" src="../bakso/assets/img/favicon/favicon.ico" alt="">
              <span class="app-brand-text demo menu-text fw-bolder ms-3">SIMa<span class="text-primary">Ta</span></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard admin-->
            <li class="menu-item ' .  $home. '">
              <a href="../home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Home">Home</div>
              </a>
            </li>
            
            <li class="menu-item ' . $bukuTamu . '">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-reader"></i>
                <div data-i18n="Buku Tamu">Buku Tamu</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item ' . $rekam . '">
                  <a href="../rekam" class="menu-link">
                    <div data-i18n="Input">Rekam Tamu Masuk</div>
                  </a>
                </li>
                <li class="menu-item ' . $data . ' ">
                  <a href="../data" class="menu-link">
                    <div data-i18n="Data Tamu">Data Kunjungan</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="menu-item">
              <a href="../Karyawan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Karyawan">Karyawan</div>
              </a>
            </li>

              <!-- Profile -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Settings</span>
              </li>
              <li class="menu-item">
                <a href="../settings/accountSettings" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-cog"></i>
                  <div data-i18n="Account Settings">Account Settings</div>
                </a>
              </li>
              
            </li>
          </ul>
        </aside>

';

