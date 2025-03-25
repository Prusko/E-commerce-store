<?php 
    include '../core/config.php';
    $valasz = "";
    $valasz .= "<h1 style='margin-top: 30px; text-align: center;'>Termékek</h1>";
    $valasz .= "<button onclick='addtermek()' class='addbtn'>Termék hozzáadása</button>";
    $valasz .= "<table class='admin-table'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Név</th>
                            <th>Leírás</th>
                            <th>Kategória</th>
                            <th>Kép</th>
                            <th>Ár</th>
                            <th>Elérhető</th>
                            <th>Művelet</th>
                        </tr>
                    <thead>";

            $result = $conn -> query("select * from aru");
            if ($result -> num_rows > 0){
            while ($row = $result -> fetch_array()){
                $catselect = $conn -> query("select megnevezes from kategoria where id='".$row['kategoriaid']."'");
                $catrow = $catselect -> fetch_array();
                $valasz .= "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['nev']."</td>
                                <td>".$row['leiras']."</td>
                                <td>".$catrow['megnevezes']."</td>
                                <td><img src='kepnezo.php?id=\"".$row['id']."\"'></td>
                                <td>".$row['ar']." Ft</td>
                                <td><input type='checkbox' class='checkbox' onclick=\"updateelerheto(".$row['id'].")\""; 
                                if ($row['elerheto'] == true){
                                    $valasz .= "checked";
                                }
                                $valasz .= "></td>
                                <td><button onclick='edittermek(".$row['id'].")' class='editbtn'>Termék szerkesztése</button></td>
                            </tr>";
                }
            
            $valasz .= "</table>";
            }   else {
            $valasz .= "<tr><td colspan='7'>Nincs elérhető termék!</td></tr></table>";
        }
    echo $valasz;
?>
