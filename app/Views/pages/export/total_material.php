<?php 
$namaFile = "Seluruh Material NTE";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$namaFile.xls");
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
        <th style="background-color: green; color: white;">Premium Huawei</th>
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
        <th></th>
        <th style="background-color: green; color: white;">Dismantling</th>
        <th></th>
        <th style="background-color: green; color: white;">Damage</th>
        <th></th>
        <th style="background-color: green; color: white;">Storage</th>

    </tr>
    <?php 
        $arrayZTE = []; $arrayPremium = []; $arrayFiberhome = []; $arrayHuawei = []; $arraySTB = []; $arrayIP = []; $arrayAP = []; $arrayPLC = []; $arrayWE = []; $arrayDismantling = []; $arrayDamage = []; $arraySTBF = []; $arrayPremiumW = []; $arrayStorage = []; $arrayPremiumH = [];
        $countZTE = 0; $countPremium = 0; $countFiberhome = 0; $countHuawei = 0; $countSTB = 0; $countIP = 0; $countAP = 0; $countPLC = 0; $countWE = 0; $countDismantling = 0; $countDamage = 0; $countSTBF = 0; $countPremiumW = 0; $countStorage = 0; $countPremiumH = 0;

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
                $arraySTB[$countSTB++] = $data['sn'];
            else if($data['type'] == 'STB Fiberhome') 
                $arraySTBF[$countSTBF++] = $data['sn'];
            else if($data['type'] == 'IP Cam') 
                $arrayIP[$countIP++] = $data['sn'];
            else if($data['type'] == 'AP') 
                $arrayAP[$countAP++] = $data['sn'];
            else if($data['type'] == 'PLC') 
                $arrayPLC[$countPLC++] = $data['sn'];
            else if($data['type'] == 'Wifi Extender') 
                $arrayWE[$countWE++] = $data['sn'];
            else if($data['type'] == 'Dismantling') 
                $arrayDismantling[$countDismantling++] = $data['sn'];
            else if($data['type'] == 'Damage') 
                $arrayDamage[$countDamage++] = $data['sn'];
            else if($data['type'] == 'Storage') 
                $arrayStorage[$countStorage++] = $data['sn'];
        }

        $nilaiMax = max($countZTE, $countPremium, $countFiberhome, $countHuawei, $countSTB, $countIP, $countAP, $countPLC, $countWE, $countDismantling, $countDamage, $countSTBF, $countPremiumW, $countStorage, $countPremiumH);

        for($perulangan = $countZTE; $perulangan <= $nilaiMax; $perulangan++){
            if($countZTE < $nilaiMax)
                $arrayZTE[$countZTE++] = "";
        }

        for($perulangan = $countPremium; $perulangan <= $nilaiMax; $perulangan++){
            if($countPremium < $nilaiMax)
                $arrayPremium[$countPremium++] = "";
        }

        for($perulangan = $countPremiumW; $perulangan <= $nilaiMax; $perulangan++){
            if($countPremiumW < $nilaiMax)
                $arrayPremiumW[$countPremiumW++] = "";
        }
        
        for($perulangan = $countPremiumH; $perulangan <= $nilaiMax; $perulangan++){
            if($countPremiumH < $nilaiMax)
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

        for($perulangan = $countDismantling; $perulangan <= $nilaiMax; $perulangan++){
            if($countDismantling < $nilaiMax)
                $arrayDismantling[$countDismantling++] = "";
        }

        for($perulangan = $countDamage; $perulangan <= $nilaiMax; $perulangan++){
            if($countDamage < $nilaiMax)
                $arrayDamage[$countDamage++] = "";
        }

        for($perulangan = $countStorage; $perulangan <= $nilaiMax; $perulangan++){
            if($countStorage < $nilaiMax)
                $arrayStorage[$countStorage++] = "";
        }

        for($perulangan = 0; $perulangan < $nilaiMax; $perulangan++) {
    ?>
    <tr>
        <td>
            <?= $arrayZTE[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayFiberhome[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayHuawei[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPremium[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPremiumW[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPremiumH[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arraySTB[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arraySTBF[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayIP[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayAP[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayPLC[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayWE[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayDismantling[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayDamage[$perulangan]; ?>
        </td>
        <td></td>
        <td>
            <?= $arrayStorage[$perulangan]; ?>
        </td>
    </tr>
    <?php } ?>

</table>