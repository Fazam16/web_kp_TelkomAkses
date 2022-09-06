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
                <a href="/input-barang-masuk">
                    <button type="button" class="btn btn-secondary">
                        Input Material Baru
                    </button>
                </a>

                <button class="btn btn-info" id="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                </button>

                <script>
                function disable_back(l) {
                    location.replace(l);
                }
                </script>
                <a onclick="disable_back('/WHSO/logout')" id="logout_btn" style="cursor: pointer;">Logout</a>
            </div>
        </div>
        <nav>
            <div class="container">
                <div class="box"><a href="#so">Material keluar/masuk</a></div>
                <div class="box"><a href="#riwayat">Riwayat</a></div>
                <div class="box"><a href="#zte">ZTE</a></div>
                <div class="box"><a href="#fiberhome">Fiberhome</a></div>
                <div class="box"><a href="#huawei">Huawei</a></div>
                <div class="box"><a href="#premium">Premium Huawei ZTE</a></div>
                <div class="box"><a href="#stb">STB</a></div>
                <div class="box"><a href="#ip">IP Cam</a></div>
                <div class="box"><a href="#ap">AP</a></div>
                <div class="box"><a href="#plc">PLC</a></div>
                <div class="box"><a href="#wifi">Wifi Extender</a></div>
                <div class="box"><a href="#dis">Dismantling</a></div>
                <div class="box"><a href="#damage">Damage</a></div>
                <div class="box"><a href="#storage">Storage</a></div>
            </div>
        </nav>
    </header>
    <main id="materialSo">
        <span id="so"></span>
        <br><br><br><br><br>
        <div id="formakun" class="hidden">
            <form action="/WHSO/editAkun" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <input type="text" class="form-control" name="uname_old" style="width: 90%;"
                        placeholder="Username Lama">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="uname" placeholder="Username Baru"
                        style="width: 90%;">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" style="width: 90%;"
                        placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password1" style="width: 90%;"
                        placeholder="Re-Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>
        <div style="clear: both;"></div>

        <div class="cardSo">
            <h3 class="card-title">Stock Opname</h3>
            <form action="/WHSO/search" class="d-flex" method="POST" role="search" style="width: 250px;">
                <input type="search" class="form-control me-2" name="sn" placeholder="Cari nomor SN">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>

        <br>
        <?php 
        if(session()->getFlashdata('search')) {
        $dapat = session()->getFlashdata('search');
        ?>
        <br>
        <form action="/WHSO/update" method="POST">
            <?= csrf_field(); ?>
            <table>
                <tr>
                    <td>
                        <label for="">SN</label><br>
                        <?= $dapat['sn']; ?>
                    </td>
                    <td><label for="">Mitra</label><br>
                        <input type="text" name="mitra" value="<?= $dapat['mitra']; ?>">
                    </td>
                <tr>

                <tr>
                    <td>
                        <label for="">Layanan</label> <br>
                        <input type="text" name="layanan" value="<?= $dapat['layanan']; ?>">
                    </td>
                    <td>
                        <label for="">Tanggal</label> <br>
                        <input type="date" name="tanggal" value="<?= $dapat['tanggal']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">SC</label><br>
                        <input type="text" name="sc" value="<?= $dapat['sc']; ?>">
                    </td>
                    <td>
                        <label for="">Notel</label><br>
                        <input type="text" name="notel" value="<?= $dapat['notel']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="">Nama Teknisi</label><br>
                        <input type="text" name="nama_teknisi" value="<?= $dapat['nama_teknisi']; ?>">
                    </td>
                </tr>
                <?php 
                    if($dapat['type'] != "Dismantling" || $dapat['type'] != "Damage" || $dapat['type'] != 'Storage') {
                ?>
                <input type="hidden" value="<?= $dapat['id']; ?>" name="id">
                <?php
                    }
                ?>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-secondary">Ubah</button>
                        <a href="/WHSO/hapusso/<?= $dapat['sn']; ?>" class="btn btn-danger"
                            onclick="return konfirmasi()">Hapus</a>
                    </td>
                </tr>
            </table>

        </form>
        <?php } else {
        ?>
        <p style="color: red;">
            <?= session()->getFlashdata('erorSearching'); ?>
        </p>
        <?php } ?>
        <span id="keluar"></span>
        <br><br>
        <div class="cardSo">
            <h4>Material Keluar</h4>
            <form action="/WHSO/prosesso" method="post">
                <?= csrf_field(); ?>
                <textarea name="sn" name="sn" placeholder="Nomor SN" cols="20" rows="2"></textarea><br>
                <input type="text" name="mac" placeholder="Nomor MAC">
                <input type="text" name="mitra" placeholder="Mitra">
                <input type="text" name="layanan" placeholder="Layanan">
                <input type="text" name="sc" placeholder="Nomor SC">
                <input type="text" name="notel" placeholder="Notel">
                <input type="text" name="nama_teknisi" placeholder="Nama Teknisi">
                <button type="submit" class="btn btn-primary" style="margin-top: -5px;">Submit</button>
            </form>
            <br>
            <?php if(session()->getFlashdata('isi')) { ?>
            <p style="color: red;">
                <?=  session()->getFlashdata('isi'); ?>
            </p>
            <?php } ?>
            <?php if(session()->getFlashdata('eror')) { ?>
            <p style="color: red;">
                <?=  session()->getFlashdata('eror'); ?>
            </p>
            <?php }
            if(session()->getFlashdata('success')) { ?>
            <p style="color: green;">
                <?=  session()->getFlashdata('success'); ?>
            </p>
            <?php } ?>
        </div>
        <br><br>
        <div class="cardSo">
            <h4>Material Masuk (Dismantling/Damage/Storage)</h4>
            <form action="/WHSO/rusak" method="post">
                <?= csrf_field(); ?>
                <select name="rusak">
                    <option value="">Kondisi</option>
                    <option value="Dismantling">Dismantling</option>
                    <option value="Damage">Damage</option>
                    <option value="Storage">Storage</option>
                </select> <br><br>
                <textarea name="sn" name="sn" placeholder="Nomor SN" cols="16" rows="2"></textarea><br>
                <input type="text" name="mac" placeholder="Nomor MAC">
                <select name="type">
                    <option value="">Tipe Material</option>
                    <option value="ZTE Biasa">ZTE Biasa</option>
                    <option value="Fiberhome">Fiberhome</option>
                    <option value="Huawei">Huawei</option>
                    <option value="Premium Huawei ZTE">Premium Huawei ZTE</option>
                    <option value="STB">STB</option>
                    <option value="IP Cam">IP Cam</option>
                    <option value="AP">AP</option>
                    <option value="PLC">PLC</option>
                    <option value="Wifi Extender">Wifi Extender</option>
                </select>
                <input type="text" name="mitra" placeholder="Mitra">
                <input type="text" name="layanan" placeholder="Layanan">
                <input type="text" name="sc" placeholder="Nomor SC">
                <input type="text" name="notel" placeholder="Notel">
                <input type="text" name="nama_teknisi" placeholder="Nama Teknisi">
                <button type="submit" class="btn btn-primary" style="margin-top: -5px;">Submit</button>
            </form> <br>
            <?php 
            if(session()->getFlashdata('nomorsn')) { ?>
            <p style="color: red;">
                <?=  session()->getFlashdata('nomorsn'); ?>
            </p>
            <?php } 

            if(session()->getFlashdata('type')) { ?>
            <p style="color: red;">
                <?=  session()->getFlashdata('type'); ?>
            </p>
            <?php } 
    
            if(session()->getFlashdata('dismantling')) { ?>
            <p style="color: red;">
                <?=  session()->getFlashdata('dismantling'); ?>
            </p>
            <?php } 
    
            if(session()->getFlashdata('erorDismantling')) { ?>
            <p style="color: red;">
                <?=  session()->getFlashdata('erorDismantling'); ?>
            </p>
            <?php } ?>

        </div>

        <?php
            echo "<span id='riwayat'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataNTE.php';
            echo "</div>";

            echo "<span id='zte'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataZTE.php';
            echo "</div>";

            echo "<span id='fiberhome'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataFiberhome.php';
            echo "</div>";

            echo "<span id='huawei'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataHuawei.php';
            echo "</div>";

            echo "<span id='premium'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataPremium.php';
            echo "</div>";

            echo "<span id='stb'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataSTB.php';
            echo "</div>";

            echo "<span id='ip'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataIPCam.php';
            echo "</div>";

            echo "<span id='ap'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataAP.php';
            echo "</div>";
            
            echo "<span id='plc'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataPLC.php';
            echo "</div>";

            echo "<span id='wifi'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataWE.php';
            echo "</div>";

            echo "<span id='dis'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataDismantling.php';
            echo "</div>";

            echo "<span id='damage'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataDamage.php';
            echo "</div>";

            echo "<span id='storage'></span>";
            echo "<br><br><br><br>";
            echo "<div class='cardSo'>";
                include 'datatabelinput/dataStorage.php';
            echo "</div>";
        ?>

    </main>

    <?php 
        include 'footer.php';
    ?>

    <script type="text/javascript">
    function konfirmasi() {
        let conf = confirm('Warning!\nApakah Anda yakin ingin menghapus item ini?')

        if (conf === true) {
            return true;
        } else {
            return false;
        }
    }

    const tombol = document.querySelector('#button');
    const formAkun = document.querySelector('#formakun');

    tombol.addEventListener('click', function() {
        formAkun.classList.toggle('hidden');
        formAkun.style.float = "right";
    });
    </script>
</body>

<?php 
    $this->endSection();
?>