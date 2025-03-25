<?php 
    $conn = New Mysqli("localhost", "fagravirdb", "Transit1.9", "fagravirdb");
    if (session_status() == PHP_SESSION_NONE){
        session_start();
        if (!isset($_SESSION['id'])){
            $_SESSION['id'] = 0;
        }
    }
?>