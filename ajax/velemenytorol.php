<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
    $mit = $_POST['mit'];
    $conn -> query("delete from velemeny where id='".$mit."'");
    }
?>