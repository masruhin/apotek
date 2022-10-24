<?php if (!empty($posts)) : foreach ($posts as $post) : ?>
<div class="col-sm-12 col-md-3 col-lg-3">
  <div class="thumbnail"
    style="padding:15px;border-radius:6px;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);position:relative;margin:20px auto;  border-radius:30px;box-shadow:  -2px -2px 8px 4px white, 2px 2px 8px 4px #222;">
    <div class="thumb-preview">
      <img src="<?php echo base_url() ?>/images/<?php echo $post['gambar']; ?>" class="img-responsive fit-image"
        alt="Foto Produk">
    </div>
    <span class="mg-title nama_produk">
      <?php if ($post['jenis'] == 'racikan') echo "<b>[racikan]</b>"; ?> <?php echo $post['nama_item']; ?>
    </span>
    <div class="row">
      <div class="col-md-12">
        <span class="text-bold">
          <?php echo rupiah($post['harga_jual']); ?>
        </span>
      </div>
    </div>
    <div class="row center">
      <div class="col-md-12">
        <a id="beli-item<?php echo $post['kode_item']; ?>" onclick="beli(this)"
          data-barcode="<?php echo $post['kode_item']; ?>" class="btn icon-btn btn-info" style="padding: 1px 15px 3px 2px;border-radius:50px; margin-top: 10px;  box-shadow: 
    12px 12px 16px 0 rgba(255, 255, 255, 0.3) inset,
    -8px -8px 12px 0 rgba(0, 0, 0, .25) inset; ">
          <span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"
            style="padding:8px;background:#ffffff;margin-right:4px; "></span>
          Jual
        </a>
        <!-- <a class="btn btn-xs btn-primary" id="beli-item<?php echo $post['kode_item']; ?>" onclick="beli(this)"
          data-barcode="<?php echo $post['kode_item']; ?>"><i class="fa fa-shopping-cart"></i> Beli Produk</a> -->
      </div>
    </div>
  </div>
</div>
<?php endforeach;
else : ?>
<div class="col-sm-12 col-md-12 col-lg-12">
  <p>Produk tidak tersedia.</p>
</div>
<?php endif; ?>
<div class="col-sm-12 col-md-12 col-lg-12">
  <ul class="pagination">
    <?php echo $this->ajax_pagination->create_links(); ?>
  </ul>
</div>
