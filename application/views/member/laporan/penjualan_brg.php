<table border=1>
    <thead>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Total</th>
    </thead>
    <tbody>
        <?php foreach($data as $item) : ?>
        <tr>
            <td><?= $item['tanggal'] ?></td>
            <td><?= $item['nama_item'] ?></td>
            <td><?= $item['harga_jual'] ?></td>
            <td><?= $item['qty'] ?></td>
            <td><?= $item['qty'] * $item['harga_jual'] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>