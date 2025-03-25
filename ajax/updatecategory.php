<?php 
    include '../core/config.php';

    if (isset($_SESSION['email'])){
        if ($_SESSION['jog'] == 1){
            if (isset($_POST['upload'])) {
                $categoryid = $_POST['categoryid'];
                $categoryvalue = $_POST['categoryvalue'];

                $conn -> query("UPDATE kategoria SET megnevezes = '$categoryvalue' WHERE id = $categoryid");
            }
        }
    }
    header('location:../admin.php');
?>