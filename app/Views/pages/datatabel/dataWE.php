<?php 
    $nama = "Wifi Extender";
?>

<h3>Data Seluruh Material <?= $nama; ?></h2>
    <p>
        <?php 
        $count = 0;
         foreach($total as $data) {
            if($data['type'] == $nama) {
                $count++;
            }
        }
        ?>
        Jumlah Total Material <?= $nama; ?> : <?= $count; ?>
    </p>
    <table border="1">
        <tr>
            <th>SN</th>
            <th>Jenis Material</th>
            <th>Tanggal</th>
        </tr>

        <?php 
            $nomor = 1;
            foreach($total as $data) {
                if($data['type'] == $nama) {
        ?>
        <tr>
            <td><?= $data['sn']; ?></td>
            <td><?= $data['type']; ?></td>
            <td><?= $data['tanggal']; ?></td>
        </tr>
        <?php 
            }
        }
        ?>
    </table>