<?php 
    include '../core/config.php';
    $valasz = "";
    $valasz .= "<h2 style='margin-top: 30px; margin-left: 20px;'>Kategóriák</h2>";
    $valasz.= "<button onclick='addcategory()' class='addbtn'>Kategória hozzáadása</button>";
    $valasz .= "<table class='admin-table'>
    <tr>
        <th>Id</th>
        <th>Megnevezés</th>
        <th>Művelet</th>
    </tr>";
    $result = $conn -> query("select * from kategoria");
    $count = 0;
    if ($result -> num_rows > 0){
    while ($row = $result -> fetch_array()){
        $count += 1;
        $valasz .= "<tr>
                        <td>".$count."</td>
                        <td>".$row['megnevezes']."</td>
                        <td><button onclick='editcategory(".$row['id'].")' class='editbtn'>Szerkesztés</button></td>
                    </tr>";
            }
        }   else {
            $valasz .= "<tr><td colspan='3'>Nincs elérhető kategória!</td></tr></table>";
        }
        $valasz .= "</table>";

    echo $valasz
?>