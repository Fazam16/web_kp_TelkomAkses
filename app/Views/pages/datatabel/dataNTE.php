<h3>Data Seluruh Material NTE</h3>
<p id="seluruhMaterialNTE">
    Jumlah Total Material NTE : <?= count($total); ?>
</p>
<div id="buttonEksport">
    <p style="float:left;">
        Ekspor ke:
    </p>
    <a href="/txt.php" style="float:left; margin-left: 10px;"><button>Notepad</button></a>
    <a href="/WHSO/excel1" style="float:left;"><button>Excel</button></a>
    <br>

    <button style="width: 200px; float: right; margin-right: 30px; margin-top: -30px;" id="hapusData">Hapus
        Data</button> <br>
    <div name="formHapus" id="formHapus" class="hidden">
        <form action="/WHSO/prosesHapusData" method="post">
            <textarea name="sn" cols="20" rows="10" placeholder="Masukan SN"></textarea>
            <br>
            <button type="submit" style="margin-bottom: 20px;" onclick="return konfirmasi()">
                Hapus
            </button>
        </form>
    </div>
    <?php if(session()->getFlashdata('success')) { ?>
    <p style="color: green;">
        <?=  session()->getFlashdata('success'); ?>
    </p>
    <?php } ?>
    <?php
    if(session()->getFlashdata('erorUniq')) {
    ?>
    <p style="color: red;">
        <?= session()->getFlashdata('erorUniq'); ?>
    </p>
    <?php } ?>
</div>
<table>
    <tr>
        <th>SN</th>
        <th>Jenis Material</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

    <?php 
            $nomor = 1;
            foreach($total as $data) {
        ?>
    <tr>
        <td><?= $data['sn']; ?></td>
        <td>
            <?php
                    if($data['type'] == 'Dismantling' || $data['type'] == 'Damage')
                        echo $data['rusak'] . " (" . $data['type'] . ")";
                    else
                        echo $data['type'];
                ?>
        </td>
        <td><?= $data['tanggal']; ?></td>
        <td><a href="/WHSO/hapusDataNTE/<?= $data['sn']; ?>" onclick="return konfirmasi()"><button type="button"
                    class="btn btn-warning" style="height: 35px;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd"
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg></button></a>
        </td>
    </tr>
    <?php 
            }
        ?>
</table>