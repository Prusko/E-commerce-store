<?php 
    include '../core/config.php';
    $select = $conn -> query("select * from kategoria");
    $valasz = "";
    $valasz .= "<div class='additem'>
    <form method='POST' action='ajax/inserttermek.php' enctype='multipart/form-data'>
    <h4>Új termék felvétel</h4>
        Termék neve: <br>
        <input type='text' class='megnevezes' name='p_name' required><br>
        Leírás: <br>
        <textarea name='p_disc' cols='55' class='leiras' rows='6' maxlength='200'></textarea><br>
        Ár: <br>
            <input type='number' class='price' name='p_price' min='0' required> Ft<br>
        Kategória: <br>
        <select name='category' style='font-size: 23px;'>";
                    while ($row = $select ->fetch_array()){ 
                        $valasz .= "<option value='".$row['id']."'>".$row['megnevezes']."</option>";
                    }
        $valasz .= "</select><br>
            Kép: <br>
            <input type='file' style='width: 125px;' name='file' required><br>
    <input type='submit' name='upload' class='editbtn' value='Termék felvétele'>
    <button class='torolbtn' onclick='termek()' style='margin-left: 10px;'>Mégse</button>
    </form>
    </div>";
    
    echo $valasz;
?>