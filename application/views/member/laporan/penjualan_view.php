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
            <th width="120px">Tanggal</th>
            <th>Nama Barang</th>
            <th width="100px">Harga</th>
            <th width="100px">Qty</th>  
            <th width="100px">Sub Total</th>  
        </tr>
    </thead>
    <tbody> 
        <?php 
            $total = 0;
            foreach($posts as $no => $item) : 
                $total_jual = $item['qty'] * $item['harga_jual'];
                $total += $total_jual;
        ?>
            <tr>
                <td><?= $item['tanggal'] ?></td>
                <td><?= $item['nama_item'] ?></td>
                <td><?= $item['harga_jual'] ?></td>
                <td class="text-center"><?= $item['qty'] ?></td>
                <td><?= $total_jual ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" class="text-right">Total Penjualan</th>
            <th><?= $total ?></th>
        </tr>
    </tfoot>
</table>
