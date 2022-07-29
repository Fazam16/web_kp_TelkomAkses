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
                <a href="stock-opname"><button type="button" class="btn btn-dark">Stock Opname</button></a>
                <a href="input-barang-masuk">
                    <button type="button" class="btn btn-secondary">
                        Input Material Baru
                    </button>
                </a>
                <script>
                function disable_back(l) {
                    location.replace(l);
                }
                </script>
                <a onclick="disable_back('/WHSO/logout')" id="logout_btn" style="cursor: pointer;">Logout</a>
            </div>
        </div>
        <nav>
            <div class=" container">
                <div class="box"><a href="#seluruhMaterialNTE">Total Material</a></div>
                <div class="box"><a href="#ontZte">ZTE</a></div>
                <div class="box"><a href="#ontFiberhome">Fiberhome</a></div>
                <div class="box"><a href="#ontHuawei">Huawei</a></div>
                <div class="box"><a href="#premium">PR.ZTE</a></div>
                <div class="box"><a href="#premiumW">PR.ZTE WIFI ID</a></div>
                <div class="box"><a href="#premiumH">PR.Huawei</a></div>
                <div class="box"><a href="#stb">STB ZTE</a></div>
                <div class="box"><a href="#stbf">STB Fiberhome</a></div>
                <div class="box"><a href="#ipCam">IP Cam</a></div>
                <div class="box"><a href="#ap">AP</a></div>
                <div class="box"><a href="#plc">PLC</a></div>
                <div class="box"><a href="#wifiExtender">Wifi Extender</a></div>
                <div class="box"><a href="#dismantling">Dismantling</a></div>
                <div class="box"><a href="#damage">Damage</a></div>
                <div class="box"><a href="#storage">Storage</a></div>
            </div>
        </nav>
    </header>
    <span id="seluruhMaterialNTE"></span>
    <br><br><br><br><br>
    <main id="material">
        <div class="seluruhMaterial" id="allMaterial">
            <?php 
                include 'datatabel/dataNTE.php';
            ?>
        </div>
        <span id="ontZte"></span>
        <br><br><br><br>
        <?php 
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataZTEBiasa.php';
            echo "</div>";

            echo "<span id='ontFiberhome'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataFiberhome.php';
            echo "</div>";

            echo "<span id='ontHuawei'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataHuawei.php';
            echo "</div>";

            echo "<span id='premium'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataPremium.php';
            echo "</div>";

            echo "<span id='premiumW'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataPremiumW.php';
            echo "</div>";
            
             echo "<span id='premiumH'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataPremiumH.php';
            echo "</div>";

            echo "<span id='stb'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataSTB.php';
            echo "</div>";

            echo "<span id='stbf'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataSTBFiberhome.php';
            echo "</div>";

            echo "<span id='ipCam'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataIPCam.php';
            echo "</div>";

            echo "<span id='ap'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataAP.php';
            echo "</div>";

            echo "<span id='plc'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataPLC.php';
            echo "</div>";

            echo "<span id='wifiExtender'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataWE.php';
            echo "</div>";

            echo "<span id='dismantling'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataDismantling.php';
            echo "</div>";

            echo "<span id='damage'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
                include 'datatabel/dataDamage.php';
            echo "</div>";
            
            echo "<span id='storage'></span>";
            echo "<br><br><br><br>";
            echo "<div class='seluruhMaterial'>";
            include 'datatabel/dataStorage.php';
            echo "</div>";
        ?>
    </main>
    <footer>
        <img src="/img/unsri.png" alt="logo unsri" style="width: 40px">
        <span id="copy">&copy; <?php echo date('Y')?> This project made with love by Mahasiswa Magang Universitas
            Sriwijaya</span>
        <span id="us"><a href="#">Tentang Kami</a></span>
    </footer>

    <script type="text/javascript">
    function konfirmasi() {
        let conf = confirm('Warning!\nApakah Anda yakin ingin menghapus item ini?')

        if (conf === true) {
            return true;
        } else {
            return false;
        }
    }




    const buttonHapus = document.getElementById('hapusData');
    const formHapus = document.getElementById('formHapus');

    buttonHapus.addEventListener('click', function() {
        formHapus.classList.toggle('hidden');
        formHapus.style.float = "right";
        formHapus.style.marginRight = '50px';

    })
    </script>
</body>

<?php 
$this->endSection();
?>