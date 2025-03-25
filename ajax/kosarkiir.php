<?php 
    include '../core/config.php';
    $valasz = "";
    $valasz .= "<div class='cart-page'><table class='table1'><tr><th>Termék</th><th>Mennyiség</th><th>Részösszeg</th></tr>";
    $total = 0;
            if (isset($_SESSION['id'])){
                if (isset($_COOKIE['kosar'.$_SESSION['id']])){
                    $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
                    if (count($kosartomb) != 0){
                        for ($i = 0; $i < count($kosartomb); $i++){
                            $result = $conn -> query("select * from aru where id=".$kosartomb[$i][0]);
                            $row = $result -> fetch_array();
                            $total += $kosartomb[$i][1] * $row['ar'];
                            $valasz .= "<tr><td>
                                                <div class='cart-info'>
                                                    <img src='kepnezo.php?id=\"".$row['id']."\"' alt='".$row['nev']."'>
                                                    <div>
                                                        <p><a href='view_page.php?id=\"".$row['id']."\"'>".$row['nev']."<a></p>
                                                        <small>".number_format($row['ar'], 0, '', ' ')." Ft</small>
                                                        <br>
                                                        <p onclick='termektorol(".$row['id'].")' class='torol'>Törlés</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><input type='number' onchange=termekdb(".$row['id'].") id='".$row['id']."' value='".$kosartomb[$i][1]."' min='0' max ='99' class='numberinput'></td>
                                            <td><strong>".number_format($kosartomb[$i][1] * $row['ar'], 0, '', ' ')." Ft</strong></td></tr>";
                        }
                    }   else {
                        $valasz .= "<tr><td colspan='3' style='text-align: center;'>Üres a kosár!</td></tr>";
                    }
                }   else {
                    $valasz .= "<tr><td colspan='3' style='text-align: center;'>Üres a kosár!</td></tr>";
                }
            }else {
                $valasz .= "<tr><td colspan='3' style='text-align: center;'>Jelentkezz be!</td></tr>";
            }       
        $valasz .= "</table><div class='total-price'>
                <div class='checkout' style='width: 600px;'>

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
                        <td><strong>Összesen</strong></td>
                        ";
                        $grandtotal = $total+$afa;
                        $valasz .= "<td><strong>".number_format($grandtotal, 0, '', ' ')." Ft</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Szállítás</strong></td>
                        <td><small>A feltüntetett ár a szállítási összeget még nem tartalmazza!</small></td>
                    </tr>";
                if (isset($_SESSION['id'])){
                    if (isset($_COOKIE['kosar'.$_SESSION['id']])){
                        $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
                        if (count($kosartomb) != 0){
                            $valasz .= "<tr>
                                <td colspan='2' style='text-align: left;'><a href='checkout.php'><button>Rendelés leadása</button></a></td>
                            </tr>";
                            }
                        }
                    }
            $valasz .= "</table></div></div>";
                
?>
<?php
    echo $valasz;
?>
