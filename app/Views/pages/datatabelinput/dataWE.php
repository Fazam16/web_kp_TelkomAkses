<?php 
    $nama = 'Wifi Extender';
?>
<h4>Riwayat Material <?= $nama;?></h4>

<table border="1" style="font-size: 14px;">
    <tr>
        <th>No</th>
        <th>SN</th>
        <th>MAC</th>
        <th>Mitra</th>
        <th>Layanan</th>
        <th>Tanggal</th>
        <th>SC</th>
        <th>Notel</th>
        <th>Nama Teknisi</th>
    </tr>
    <?php 
    $nomor = 1;
    foreach(array_reverse($keluar) as $data) {
        if($data['type'] == $nama) {
    ?>
    <tr>
        <td><?= $nomor++; ?></td>
        <td><?= $data['sn']; ?></td>
        <td><?= $data['mac']; ?></td>
        <td><?= $data['mitra']; ?></td>
        <td><?= $data['layanan']; ?></td>
        <td><?= $data['tanggal']; ?></td>
        <td><?= $data['sc']; ?></td>
        <td><?= $data['notel']; ?></td>
        <td><?= $data['nama_teknisi']; ?></td>
    </tr>

    <?php }} ?>

</table>