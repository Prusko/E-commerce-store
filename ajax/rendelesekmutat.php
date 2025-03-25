<?php 
include '../core/config.php';
    $mit = $_POST['mit'];
    $valasz = "";
    $valasz .= "<button onclick='rendelesek()' style=' font-size: 20px; background: crimson; cursor: pointer; color: white; padding: 10px; border-radius: 10px; margin-top: 30px; margin-left: 20px;'>Vissza</button><h2 style='margin-top: 30px; margin-left: 20px;'>Rendelések</h2>";
    $valasz .= "<table class='admin-table'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Név</th>
                            <th>Cím</th>
                            <th>Ár</th>
                            <th>Dátum</th>
                            <th>Állapot</th>
                        </tr>
                    <thead>";

            $result = $conn -> query("select * from rendelesek where datum LIKE'".$mit."%'");
            if ($result -> num_rows > 0){
            while ($row = $result -> fetch_array()){
                $rendtart = "SELECT aru.id, aru.nev, aru.ar, rendeles.db from aru, rendeles where aru.id = rendeles.aruid and rendid=".$row['id'];
                $restart = $conn -> query($rendtart);
                $valasz .= "<tr onclick=\"rendelesmutat('termek".$row['id']."')\" style='cursor: pointer;'>
                                <td>".$row['id']."</td>
                                <td>".$row['nev']."</td>
                                <td>".$row['cim']."</td>
                                <td>".number_format($row['osszeg'], 0, '', ' ')." Ft</td>
                                <td>".$row['datum']."</td>
                                <td>";
                                if ($row['allapot'] == 0){
                                    $valasz .= "<select id='".$row['id']."' onchange='allapvaltoztat(this.id, this.value)'><option value='0' selected>Megrendelve</option><option value='1'>Kiszállítás</option><option value='2'>Rendezve</option></select></td></tr>";
                                }
                                if ($row['allapot'] == 1){
                                    $valasz .= "<select id='".$row['id']."' onchange='allapvaltoztat(this.id, this.value)'><option value='0'>Megrendelve</option><option value='1' selected>Kiszállítás</option><option value='2'>Rendezve</option></select></td></tr>";
                                }
                                if ($row['allapot'] == 2){
                                    $valasz .= "<select id='".$row['id']."' onchange='allapvaltoztat(this.id, this.value)'><option value='0'>Megrendelve</option><option value='1'>Kiszállítás</option><option value='2' selected>Rendezve</option></select></td></tr>";
                                }
                    $valasz .= "<tr style='display: none;' id='termek".$row['id']."'><td colspan='6'>";
                    while ($rowtart = $restart -> fetch_array()){
                        $valasz .= "<a href='view_page.php?id=".$rowtart['id']."' target='_blank'>".$rowtart['nev']."</a> - ".$rowtart['db']." db<br>";
                    }
                    $valasz .= "</td></tr>";
                }
            
            $valasz .= "</table>";
            }   else {
            $valasz .= "<tr><td colspan='7'>Nincs elérhető rendelés!</td></tr></table>";
        }
    echo $valasz;
?>