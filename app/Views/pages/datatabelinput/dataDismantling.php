<?php 
    $nama = "Dismantling";
?>

<h3>Data Seluruh Material <?= $nama; ?></h3>
<table border="1" style="font-size: 14px;">
    <tr>
        <th>No</th>
        <th>SN</th>
        <th>MAC</th>
        <th>Jenis Material</th>
        <th>Mitra</th>
        <th>Layanan</th>
        <th>Tanggal</th>
        <th>SC</th>
        <th>Notel</th>
        <th>Nama Teknisi</th>
    </tr>

    <?php 
            $nomor = 1;
            foreach($masuk as $data) {
                if($data['type'] == $nama) {
        ?>
    <tr>
        <td><?= $nomor++; ?></td>
        <td><?= $data['sn']; ?></td>
        <td><?= $data['mac']; ?></td>
        <td><?= $data['rusak']; ?></td>
        <td><?= $data['mitra']; ?></td>
        <td><?= $data['layanan']; ?></td>
        <td><?= $data['tanggal']; ?></td>
        <td><?= $data['sc']; ?></td>
        <td><?= $data['notel']; ?></td>
        <td><?= $data['nama_teknisi']; ?></td>
    </tr>
    <?php 
                }
        }
        ?>
</table>