<?php 
    include "../core/config.php";

    if (isset($_SESSION['email'])){
        $value = $_POST['value'];
        $vegosszeg = $_POST['vegosszeg'];

        $valasz = "";
        if ($value == 1 || $value == 2){
            $szallitasosszeg = 1685;
            $vegosszeg += $szallitasosszeg;
            $valasz .=  number_format($vegosszeg, 0, '', ' ');
        }
        else {
            $szallitasosszeg = 0;
            $valasz .= number_format($vegosszeg, 0, '', ' ');
        }
        echo $valasz;
    }
?>