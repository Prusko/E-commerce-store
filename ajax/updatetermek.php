<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
        if ($_SESSION['jog'] == 1){
            if (isset($_POST['upload'])) {
                $p_id = $_POST['id'];

                $p_name = mysqli_real_escape_string($conn ,$_POST['p_name']);
                $p_disc = mysqli_real_escape_string($conn ,$_POST['p_disc']);
                $category = mysqli_real_escape_string($conn ,$_POST['category']);
                $p_price = mysqli_real_escape_string($conn ,$_POST['p_price']);

                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    $file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                    $conn->query("UPDATE aru SET kep='$file', nev='$p_name', leiras='$p_disc', kategoriaid='$category', ar='$p_price' WHERE id=$p_id");
                } else {
                    $conn->query("UPDATE aru SET nev='$p_name', leiras='$p_disc', kategoriaid='$category', ar='$p_price' WHERE id=$p_id");
                }

                header('location:../admin.php');
            }
        }
    }
?>