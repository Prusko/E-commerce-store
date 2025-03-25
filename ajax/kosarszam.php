<?php 
    include '../core/config.php';
    if (isset($_COOKIE['kosar'.$_SESSION['id']])){
        $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
        $count = 0;
        foreach($kosartomb as $elem){
            $count += 1;
        }
        echo $count;
    }   else {
        echo "0";
    }
?>