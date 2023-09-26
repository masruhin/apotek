<style>
    table thead th {
        text-align: center;
        vertical-align: middle !important;
    }
</style>
<?php 
    // echo '<pre>';
    // print_r($posts);
    // echo '</pre>';
?>
<table class="table table-bordered table-striped table-condensed mb-none">
    <thead>
        <tr>
            <th rowspan="2" width="50px">No</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2" width="100px">Harga Beli</th>
            <th rowspan="2" width="80px">Harga Jual</th> 
            <th rowspan="2" width="80px">Stok Awal</th> 
            <th colspan="4" width="120px">Penjualan</th>  
            <th rowspan="2" width="100px">Stok Akhir</th>  
        </tr>
        <tr>
            <th width="80px">Qty</th>  
            <th width="100px">Total Harga Jual</th>  
            <th width="100px">Total Harga Beli</th>  
            <th width="100px">Pendapatan</th>  
        </tr>
    </thead>
    <tbody> 
        <?php 
            foreach($posts as $no => $item) : 
                $total_jual = $item['qty'] * $item['harga_jual'];
                $total_beli = $item['qty'] * $item['harga_beli'];
                $pendapatan = $total_jual - $total_beli;
                $stok_akhir = $item['stok_awal'] - $item['qty'];
        ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $item['nama_item'] ?></td>
                <td><?= $item['harga_beli'] ?></td>
                <td><?= $item['harga_jual'] ?></td>
                <td class="text-center"><?= $item['stok_awal'] ?></td>
                <td class="text-center"><?= $item['qty'] ?></td>
                <td><?= $item['harga_jual'] ?></td>
                <td><?= $item['harga_beli'] ?></td>
                <td><?= $pendapatan ?></td>
                <td class="text-center"><?= $stok_akhir ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
