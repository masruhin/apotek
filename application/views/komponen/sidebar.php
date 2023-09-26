<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

  <div class="sidebar-header">
    <div class="sidebar-title"></div>
    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
      data-fire-event="sidebar-left-toggle">
      <i class="fa fa-bars" aria-label="Toggle sidebar" style="color:white"></i>
    </div>
  </div>

  <div class="nano">
    <div class="nano-content">
      <nav id="menu" class="nav-main" role="navigation">
        <ul class="nav nav-main">
          <li>
            <a href="<?php echo base_url() ?>">
              <i class="fa fa-home" aria-hidden="true"></i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>master">
              <i class="fa fa-stethoscope" aria-hidden="true"></i>
              <span>Master Data</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>pembelian">
              <i class="fa fa-inbox" aria-hidden="true"></i>
              <span>Pembelian</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>stok">
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <span>Data Stok</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>penjualan">
              <i class="fa  fa-shopping-cart" aria-hidden="true"></i>
              <span>Penjualan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>keuangan">
              <i class="fa fa-money" aria-hidden="true"></i>
              <span>Keuangan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>laporan">
              <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
              <span>Buat Laporan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>user">
              <i class="fa fa-user-md" aria-hidden="true"></i>
              <span>Pengaturan Pengguna</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url() ?>tools">
              <i class="fa fa-wrench" aria-hidden="true"></i>
              <span>Tools</span>
            </a>
          </li>
        </ul>
      </nav>

      <hr class="separator" />

    </div>

  </div>

</aside>
<!-- end: sidebar -->
