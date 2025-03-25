<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
        $mit = $_POST['mit'];
        $total = 0;
        $valasz = "<strong>#".$mit."</strong><br><table>";
        $rendeles = $conn -> query("SELECT aru.nev, aru.ar, aru.id, rendeles.db from aru, rendeles where aru.id=rendeles.aruid and rendeles.rendid=".$mit);
                while ($termek = $rendeles -> fetch_array()){
                    $total += $termek['ar'] * $termek['db'];
                    $valasz .= "<tr><td><a style='font-size: 18px;' href='view_page.php?id=".$termek['id']."'>".$termek['nev']."</a></td><td>".$termek['db']." db</td><td>".$termek['ar'] * $termek['db']." Ft</td><tr>";
                }
            $valasz .= "</table></table><div class='total-price' style='text-align: right; display: flex; justify-content: right;'>
            <div class='checkout'>

            </div>
            <table>
                <tr>
                    <td><strong>Résszösszeg</strong></td>
                    <td><strong>".number_format($total, 0, '', ' ')." Ft</strong></td>
                </tr>
                <tr>
                    <td><strong>Áfa</strong></td>";
                    $afa = $total*0.27;
                    $afa = round($afa/5)*5;
                    $valasz .= "<td><strong>".number_format($afa, 0, '', ' ')." Ft</strong></td>
                </tr>
                <tr>
                    <td><strong>Szállítás</strong></td>";
                    $szallitaskerdez = $conn -> query("SELECT rendelesek.szallitas FROM rendelesek WHERE rendelesek.id =".$mit);
                    $szallitasmod = $szallitaskerdez -> fetch_array();
                    if ($szallitasmod['szallitas'] == 1 || $szallitasmod['szallitas'] == 2){
                        $szallitas = 1685;
                    }
                    else {
                        $szallitas = 0;
                    }                    
                    $valasz .= "<td><strong>".number_format($szallitas, 0, '', ' ')." Ft </strong></td>
                </tr>
                <tr>
                    <td><strong>Összesen</strong></td>
                    ";
                    $grandtotal = $total+$afa+$szallitas;
                    $valasz .= "<td><strong>".number_format($grandtotal, 0, '', ' ')." Ft</strong></td>
                </tr><table>";
        echo $valasz;
    }    
?>