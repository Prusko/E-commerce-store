<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
    if (isset($_POST['upload'])){
        if (is_uploaded_file($_FILES['file']['tmp_name'])){
            $nev = $conn -> real_escape_string($_POST['p_name']);
            $price = $conn -> real_escape_string($_POST['p_price']);
            $pdisc = $conn -> real_escape_string($_POST['p_disc']);
            $category = $conn -> real_escape_string($_POST['category']);
            $file = $_FILES['file']['tmp_name'];
            if (!empty($nev) and !empty($price) and !empty($category) and !empty($pdisc)){
            $tipus = mime_content_type($file);
            $file = addslashes(file_get_contents($file));
            $sqlmondat = "INSERT INTO aru VALUES (0,'$nev', '$pdisc', '$category', '$file', '$tipus', '$price', 1)";
            $conn -> query($sqlmondat);
            header('location: ../admin.php');
            }   else {
                header('location: ../admin.php');
            }
        }
    }
}
?>