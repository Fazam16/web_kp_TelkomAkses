<?php 
    $this->extend('template/template');
    $this->section('body');
?>

<body>
    <header id="headerMaterial">
        <div id="headerContent">
            <div id="image">
                <img src="/img/logo.png" alt="Logo Telkom Akses">
            </div>
            <div id="chooseButton">
                <a href="/material"><button type="button" class="btn btn-dark">Lihat Seluruh Material</button></a>
                <a href="stock-opname"><button class="btn btn-secondary">Stock Opname</button></a>
                <a href="/input-barang-masuk"><button class="btn btn-warning">Input Material Baru</button></a>
                <a href="#" id="logout_btn">Logout</a>
            </div>

        </div>
        <nav>
            <div class="container">

            </div>
        </nav>
    </header>
    <br><br><br><br>
    <div class="seluruhMaterial" id="allMaterial">
        <div id="buttonEksport">
            <p style="float:left; margin-left: 30px;">
                Ekspor ke:
            </p>
            <a href="/WHSO/excel" style="float:left; margin-left: 10px;"><button>Excel</button></a>
            <br><br>
            <a href="/WHSO/hapus" onclick="return konfirmasi()" style="float: left; margin-left: 20px; "><button
                    style="width: 200px;">Hapus seluruh data</button></a>
        </div>
        <br> <br>

        <table>
            <tr>
                <th>No</th>
                <th>SN</th>
                <th>Type</th>
            </tr>

            <?php 
                $no = 1;
                foreach($input as $tampil) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tampil['sn']; ?></td>
                <td><?= $tampil['type']; ?></td>
            </tr>
            <?php 
                }
            ?>
        </table>
    </div>
    <br><br><br>
    <footer>
        <span id="copy">
            <img src="/img/unsri.png" alt="logo unsri" style="width: 40px">
            &copy; <?php echo date('Y')?> This project made with love by Mahasiswa Magang Universitas Sriwijaya
        </span>
        <span id="us"><a href="#">Tentang Kami</a></span>
    </footer>
    <script>
    function konfirmasi() {
        let conf = confirm('Warning!\nApakah Anda yakin ingin menghapus seluruh item input material baru?')

        if (conf === true) {
            return true;
        } else {
            return false;
        }
    }
    </script>
</body>

<?php 
    $this->endSection();
?>