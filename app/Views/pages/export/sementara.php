<?php 
$namaFile = "New Material";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$namaFile.xlsx");
?>

<table border="2">
    <tr>
        <th style="background-color: green; color: white;">ZTE Biasa</th>
        <th></th>
        <th style="background-color: green; color: white;">Fiberhome</th>
        <th></th>
        <th style="background-color: green; color: white;">Huawei</th>
        <th></th>
        <th style="background-color: green; color: white;">Premium ZTE</th>
        <th></th>
        <th style="background-color: green; color: white;">Premium ZTE WIFI ID</th>
        <th></th>
        <th style="background-color: green; color: white;">STB ZTE</th>
        <th></th>
        <th style="background-color: green; color: white;">STB Fiberhome</th>
        <th></th>
        <th style="background-color: green; color: white;">IP Cam</th>
        <th></th>
        <th style="background-color: green; color: white;">AP</th>
        <th></th>
        <th style="background-color: green; color: white;">PLC</th>
        <th></th>
        <th style="background-color: green; color: white;">Wifi Extender</th>
    </tr>
    <?php 
        $arrayZTE = []; $arrayPremium = []; $arrayFiberhome = []; $arrayHuawei = []; $arraySTB = []; $arrayIP = []; $arrayAP = []; $arrayPLC = []; $arrayWE = []; $arraySTBF = []; $arrayPremiumW = []; $arrayPremiumH = [];
        $countZTE = 0; $countPremium = 0; $countFiberhome = 0; $countHuawei = 0; $countSTB = 0; $countIP = 0; $countAP = 0; $countPLC = 0; $countWE = 0; $countSTBF = 0; $countPremiumW = 0; $countPremiumH = 0;

        foreach($sementara as $data) {
            if($data['type'] == 'ZTE Biasa') 
                $arrayZTE[$countZTE++] = $data['sn'];
            else if($data['type'] == 'Premium ZTE')
                $arrayPremium[$countPremium++] = $data['sn'];
            else if($data['type'] == 'Premium ZTE WIFI ID')
                $arrayPremiumW[$countPremiumW++] = $data['sn'];
            else if($data['type'] == 'Premium Huawei')
                $arrayPremiumH[$countPremiumH++] = $data['sn'];
            else if($data['type'] == 'Fiberhome') 
                $arrayFiberhome[$countFiberhome++] = $data['sn'];
            else if($data['type'] == 'Huawei') 
                $arrayHuawei[$countHuawei++] = $data['sn'];
            else if($data['type'] == 'STB ZTE') 
                $arraySTBF[$countSTBF++] = $data['sn'];
            else if($data['type'] == 'STB Fiberhome') 
                $arraySTB[$countSTB++] = $data['sn'];
            else if($data['type'] == 'IP Cam') 
                $arrayIP[$countIP++] = $data['sn'];
            else if($data['type'] == 'AP') 
                $arrayAP[$countAP++] = $data['sn'];
            else if($data['type'] == 'PLC') 
                $arrayPLC[$countPLC++] = $data['sn'];
            else if($data['type'] == 'Wifi Extender') 
                $arrayWE[$countWE++] = $data['sn'];
        }

        $nilaiMax = max($countZTE, $countPremium, $countFiberhome, $countHuawei, $countSTB, $countIP, $countAP, $countPLC, $countWE, $countSTBF, $countPremiumW, $countPremiumH);

        for($perulangan = $countZTE; $perulangan <= $nilaiMax; $perulangan++){
            if($countZTE < $nilaiMax)
                $arrayZTE[$countZTE++] = "";
        }

        for($perulangan = $countPremium; $perulangan <= $nilaiMax; $perulangan++){
            if($countPremium < $nilaiMax)
                $arrayPremium[$countPremium++] = "";
        }

        for($perulangan = $countPremiumW; $perulangan <= $nilaiMax; $perulangan++){
            if($countPremiumW< $nilaiMax)
                $arrayPremiumW[$countPremiumW++] = "";
        }
        
        for($perulangan = $countPremiumH; $perulangan <= $nilaiMax; $perulangan++){
            if($countPremiumH< $nilaiMax)
                $arrayPremiumH[$countPremiumH++] = "";
        }

        for($perulangan = $countFiberhome; $perulangan <= $nilaiMax; $perulangan++){
            if($countFiberhome < $nilaiMax)
                $arrayFiberhome[$countFiberhome++] = "";
        }
        
        for($perulangan = $countHuawei; $perulangan <= $nilaiMax; $perulangan++){
            if($countHuawei < $nilaiMax)
                $arrayHuawei[$countHuawei++] = "";
        }

        for($perulangan = $countSTB; $perulangan <= $nilaiMax; $perulangan++){
            if($countSTB < $nilaiMax)
                $arraySTB[$countSTB++] = "";
        }

        for($perulangan = $countSTBF; $perulangan <= $nilaiMax; $perulangan++){
            if($countSTBF < $nilaiMax)
                $arraySTBF[$countSTBF++] = "";
        }
        
        for($perulangan = $countIP; $perulangan <= $nilaiMax; $perulangan++){
            if($countIP < $nilaiMax)
                $arrayIP[$countIP++] = "";
        }
    
        for($perulangan = $countAP; $perulangan <= $nilaiMax; $perulangan++){
            if($countAP < $nilaiMax)
                $arrayAP[$countAP++] = "";
        }

        for($perulangan = $countPLC; $perulangan <= $nilaiMax; $perulangan++){
            if($countPLC < $nilaiMax)
                $arrayPLC[$countPLC++] = "";
        }
        
        for($perulangan = $countPLC; $perulangan <= $nilaiMax; $perulangan++){
            if($countPLC < $nilaiMax)
                $arrayPLC[$countPLC++] = "";
        }

        for($perulangan = $countWE; $perulangan <= $nilaiMax; $perulangan++){
            if($countWE < $nilaiMax)
                $arrayWE[$countWE++] = "";
        }

        for($perulangan = 0; $perulangan < $nilaiMax; $perulangan++) {
    ?>
    <tr>
        <td>
            <?= $arrayZTE[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayFiberhome[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayHuawei[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPremium[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPremiumW[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPremiumH[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arraySTB[$perulangan] . "\t" ; ?>
        </td>
        <td></td>
        <td>
            <?= $arraySTBF[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayIP[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayAP[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPLC[$perulangan] . "\t"; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayWE[$perulangan] . "\t"; ?>
        </td>
    </tr>
    <?php } ?>

</table>