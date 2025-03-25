<?php 
    include '../core/config.php';
    $mit = $_POST['mit'];    
    $aruselect = $conn -> query("select * from aru where id ='$mit'");
    $rowaru = $aruselect -> fetch_array();
    $valasz = "";
    $valasz .= "<div class='additem'>
                    <form method='post' action='ajax/updatetermek.php' enctype='multipart/form-data'>
                    <h4>Termék szerkesztése</h4>
                            Termék neve: <br>
                            <input type='text' name='p_name' class='megnevezes' value='".$rowaru['nev']."' required><br>
                            Leírás: <br>
                            <textarea name='p_disc' class='leiras' cols='55' rows='6' maxlength='300'>".$rowaru['leiras']."</textarea><br>
                            Ár: <br>
                            <input type='number' name='p_price' class='price' min='0' value='".$rowaru['ar']."' required> Ft<br>
                        Kategória: <br>
                        <select name='category' style='font-size: 23px;'>";
                            $catselect1 = $conn -> query("select * from kategoria where id='".$rowaru['kategoriaid']."'");
                                    while ($row = $catselect1 -> fetch_array()){ 
                                        $valasz .= "<option value='".$row['id']."'>".$row['megnevezes']."</option>";
                                    }
                            $catselect2 = $conn -> query("select * from kategoria where id !='".$rowaru['kategoriaid']."'");
                                    while ($row2 = $catselect2 -> fetch_array()){
                                        $valasz .= "<option value='".$row2['id']."'>".$row2['megnevezes']."</option>";
                                    }
                        $valasz .= "</select><br>
                            Kép: <br>
                            <img style='width: 150px; height: auto;' src='kepnezo.php?id=\"".$rowaru['id']."\"'><br>
                            <input type='file' style='border: none;' name='file'><br>
                            <input type='hidden' name='id' value='$mit' style='display: none;'>
                    <input type='submit' name='upload' class='editbtn' value='Termék frissítése'>
                    </form><button class='torolbtn' onclick='termek()'>Mégse</button>
                </div>";
    
    echo $valasz;
?>