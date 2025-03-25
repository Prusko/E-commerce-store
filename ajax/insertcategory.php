<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
    $cname = $conn -> real_escape_string($_POST['catname']);
    $result = $conn -> query("insert into kategoria values('0', '$cname')");
    }
?>