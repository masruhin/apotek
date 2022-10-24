<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- start: header -->
<header class="header">
  <div class="logo-container">
    <a href="<?php echo base_url() ?>" class="logo">
      <img
        src="<?php echo base_url() ?>assets/images/<?php echo $this->db->get_where('profil_apotek', array('id' => '1'), 1)->row()->logo; ?>"
        height="35" alt="Logo" />
    </a>
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
      data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <div class="header-right">
    <ul class="notifications">
      <li>
        <a href="<?php echo base_url() ?>penjualan/kasir" class="btn icon-btn btn-lg btn-info"
          style="padding: 1px 15px 3px 2px;border-radius:50px;box-shadow:  -2px -2px 8px 4px white, 2px 2px 8px 4px #222;">
          <span class="glyphicon btn-glyphicon glyphicon-shopping-cart img-circle text-info"
            style="padding:8px;background:#ffffff;margin-right:4px;" disabled="disabled"></span>
          Menu Kasir
        </a>
      </li>
    </ul>


    <span class="separator"></span>
    <div id="userbox" class="userbox">
      <a href="#" data-toggle="dropdown">
        <div class="profile-info" style="min-width:60px;">
          <span class="name"><?php echo $this->session->userdata('nama_admin'); ?></span>
          <span class="role"><?php echo $this->session->userdata('nama_kategori'); ?></span>
        </div>
        <i class="fa custom-caret"></i>
      </a>
      <div class="dropdown-menu">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a role="menuitem" tabindex="-1" href="<?php echo base_url() ?>password"><i class="fa fa-lock"></i> Ganti
              Password</a>
          </li>
          <li>
            <a role="menuitem" href="<?php echo base_url() ?>dashboard/logout"><i class="fa fa-power-off"></i>
              Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end: search & user box -->
</header>
<!-- end: header -->
