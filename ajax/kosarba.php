<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
        if (isset($_COOKIE['kosar'.$_SESSION['id']])){
            $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
        }   else {
            $kosartomb = array();
        }
        $tombindex = -1;
        for ($i = 0; $i < count($kosartomb); $i++){
            if ($kosartomb[$i][0] == $_POST['id']){
                $tombindex = $i;
                break;
            }
        }
        if ($tombindex == -1){
            $tombmerete = count($kosartomb);
            $kosartomb[$tombmerete][0] = $_POST['id'];
            $kosartomb[$tombmerete][1] = $_POST['mennyit'];
        }   else {
            $kosartomb[$tombindex][1] += $_POST['mennyit'];
        }
        setcookie('kosar'.$_SESSION['id'], serialize($kosartomb), time()+86400, "/");
    }
?>