<?php 
    include '../core/config.php';
    if (isset($_SESSION['id'])){
        $db = $_POST['db'];
        $id = $_POST['id'];
        $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
        if ($db > 0){
            for ($i = 0; $i < count($kosartomb); $i++){
                if ($kosartomb[$i][0] == $id){
                    $kosartomb[$i][1] = $db;
                    break;
                }
            }
            setcookie('kosar'.$_SESSION['id'], serialize($kosartomb), time()+86400, "/");
        }   else {
            $ujkosar = array();
                for ($i = 0; $i < count($kosartomb); $i++){
                    if ($kosartomb[$i][0] != $id){
                        $ujkosar[] = $kosartomb[$i];
                    }
                }
            setcookie('kosar'.$_SESSION['id'], serialize($ujkosar), time()+86400, "/");
        }
    }
?>