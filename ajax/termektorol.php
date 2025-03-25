<?php
    include '../core/config.php';
    if (isset($_SESSION['email'])){
    $torolni = $_POST['id'];
    if (isset($_COOKIE['kosar'.$_SESSION['id']])){
        $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
        $ujkosar = array();
        for ($i = 0; $i < count($kosartomb); $i++){
            if ($kosartomb[$i][0] != $torolni){
                $ujkosar[] = $kosartomb[$i];
            }
        }
        setcookie('kosar'.$_SESSION['id'], serialize($ujkosar), time()+86400, "/");
    }   else {
        echo "Üres a kosár";
    }
}
?>