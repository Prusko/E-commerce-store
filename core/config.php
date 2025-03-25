<?php 
    $conn = New Mysqli("localhost", "root", "", "fagravirdb");
    if (session_status() == PHP_SESSION_NONE){
        session_start();
        if (!isset($_SESSION['id'])){
            $_SESSION['id'] = 0;
        }
    }
?>
