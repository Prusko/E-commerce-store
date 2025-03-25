<?php 
    include '../core/config.php';

    if (isset($_SESSION['email'])){
        if ($_SESSION['jog'] == 1){
            $mit = $_POST['mit'];

            $select = $conn -> query("SELECT elerheto FROM aru WHERE id = $mit");
            $selectrow = $select -> fetch_array();
            if ($selectrow['elerheto']){
                $conn -> query("UPDATE aru SET elerheto = 0 WHERE id = $mit");
            }
            else {
                $conn -> query("UPDATE aru SET elerheto = 1 WHERE id = $mit");
            }
        }
    }
?>