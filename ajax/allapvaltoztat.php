<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
    $mit = $_POST['mit'];
    $mire = $_POST['mire'];

    $conn -> query("update rendelesek set allapot='$mire' where id='$mit'");
    }
?>