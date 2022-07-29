<?php
    $localhost = 'localhost';
    $db = 'whso';
    $username = 'root';
    $pass = '';
    
    $conn = mysqli_connect($localhost, $username, $pass, $db);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    } 
    
    date_default_timezone_set("Asia/Jakarta");
    $bdate = date("Y-m-d");
    
    function bulan_indo($bulan_angka) {
        $bulan = array(1=>
        'Januari', 
        'Februari', 
        'Maret', 
        'April', 
        'Mei', 
        'Juni', 
        'Juli', 
        'Agustus', 
        'September', 
        'Oktober', 
        'November', 
        'Desember'
        );
                                                                 
        return $bulan[$bulan_angka];
    }    
                                                                 
    $tampH="" ;
    $tampB=0;
    $tampT=0;
    $format_indo = date('d-m-Y', strtotime($bdate));
    $pecah = explode('-', $format_indo);
                                                              
    $tgl = $pecah[0];
    $bulan = $pecah[1];
    $tahun = $pecah[2];
                                                                 
    $tampH=$tgl;
    $tampB=bulan_indo((int)$bulan);
    $tampT=$tahun;
                               
    $lahir =  $tampH . " " . $tampB . " " . $tampT;

    $namaFile = "SO NTE " . $lahir;

    header("Content-type: text/plain");
    header("Content-Disposition: attachment; filename=" . $namaFile . ".txt"); 
    $query = mysqli_query($conn, 'SELECT * FROM total_material');
    
    while($sn = mysqli_fetch_array($query)) {
        echo $sn['sn'] . "\r\n";
    }
    
    
    

    