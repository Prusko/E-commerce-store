<?php 
    include '../core/config.php';
    $valasz = "";
    $valasz .= "<div class='additem'>
    <h4>Új kategória felvétel</h4>
    Kategória neve:<br>
    <input type='text' id='catname' class='category' style='font-size: 30px;' required><br>
    <input type='submit' class='editbtn' onclick='insertcategory()' value='Kategória felvétele'><button class='torolbtn' onclick='category()' style='margin-left: 10px;'>Mégse</button>
    </div>";
    
    echo $valasz;
?>
