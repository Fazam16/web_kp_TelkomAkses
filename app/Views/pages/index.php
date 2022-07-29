<?= $this->extend('template/template'); ?>
<?= $this->section('body'); ?>

<body id="index">
    <div id="flex">
        <div id="box1"></div>
        <div id="box2"></div>
        <div id="contentIndex">
            <h1 align="center">Login Telkom Akses</h1>
            <form action="/WHSO/auth" method="POST">
                <?= csrf_field(); ?>
                <label for="uname">Username</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"
                        style="height: 50px; position: relative; top: 10px;"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg></span>
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="masukkan username"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <?php if(session()->getFlashdata('erorLoginUname')) { ?>
                <p style="margin-bottom: -15px;">
                    <?=  session()->getFlashdata('erorLoginUname'); ?>
                </p>
                <?php } ?>
                <label for="password">Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"
                        style="height: 50px; position: relative; top: 10px;    "><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                        </svg></span>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="masukkan password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <?php if(session()->getFlashdata('erorLoginPassword')) { ?>
                <p style="margin-bottom: -10px;">
                    <?=  session()->getFlashdata('erorLoginPassword'); ?>
                </p>
                <?php } ?>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>

</body>

<?= $this->endSection(); ?>