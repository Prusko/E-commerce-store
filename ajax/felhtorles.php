<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
        if ($_SESSION['jog'] == 1){
    $torlendo = $_POST['adatok'];
    $torlendo = explode(',',$torlendo);
    $valasz = "";
    foreach($torlendo as $elem){
        $valasz .= "'".$elem."',";
    }
    $valasz = substr($valasz,0,-1);
    $conn -> query("update felhasznalok set jog='2' where id in($valasz)");
}
    }
?>