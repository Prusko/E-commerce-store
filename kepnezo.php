<?php
    include 'core/config.php';
    if(isset($_GET['id'])){
        $select = "select keptipus, kep from aru where id = ".$_GET['id']."";
        $result = $conn -> query($select);
        $row = $result -> fetch_array();
        header('Content-type: '.$row['keptipus']);
        echo $row['kep'];
    }
?>