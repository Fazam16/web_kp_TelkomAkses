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
                <a href="lihat-data"><button class="btn btn-success">Lihat Data Baru</button></a>
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

            </div>
        </nav>
    </header>
    <br><br>
    <main id="input">
        <?php 
        if(session()->getFlashdata('erorType')) { ?>
        <p style="color: red; ">
            <?=  session()->getFlashdata('erorType'); ?>
        </p>
        <?php 
            } 
            if(session()->getFlashdata('success')) { ?>
        <p style="color: green;">
            <?=  session()->getFlashdata('success'); ?>
        </p>
        <?php 
            }
        ?>
        <form action="/WHSO/prosesInput" method="POST">
            <?= csrf_field(); ?>
            <div class="form-floating">
            </div>
            <select name="type">
                <option value="">Tipe Material</option>
                <option value="ZTE Biasa">ZTE Biasa</option>
                <option value="Fiberhome">Fiberhome</option>
                <option value="Huawei">Huawei</option>
                <option value="Premium ZTE">Premium ZTE</option>
                <option value="Premium ZTE WIFI ID">Premium ZTE WIFI ID</option>
                <option value="Premium Huawei">Premium Huawei</option>
                <option value="STB ZTE">STB ZTE</option>
                <option value="STB Fiberhome">STB Fiberhome</option>
                <option value="IP Cam">IP Cam</option>
                <option value="AP">AP</option>
                <option value="PLC">PLC</option>
                <option value="Wifi Extender">Wifi Extender</option>
            </select><br>
            <br>
            <label for="floatingTextarea2" class="form-label">Input Material Baru</label>
            <textarea class="form-control" name="sn" style="max-width: 200px; margin: auto;" rows="13"
                id="floatingTextarea2" placeholder="Input/scan material di sini!"></textarea>
            <br>
            <button type="submit">Submit</button>
        </form>
    </main>
    <?php 
        include 'footer.php';
    ?>
</body>

<?php 
    $this->endSection();
?>