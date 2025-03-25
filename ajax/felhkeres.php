<?php 
    include '../core/config.php';
    $valasz = "";
    $valasz .= "<h2 style='margin-top: 30px; margin: 30px 20px;'>Felhasználók</h2>
    <input type='text' placeholder='Kereső' id='kereso' class='kereso'><button onclick=\"felhkeres()\" class='addbtn'>Keresés</button><button onclick=\"users()\" class='torolbtn'>Vissza</button><br>";
    $valasz .= "<button class='torolbtn' style='margin-left: 20px;' onclick=\"felhtorol()\">Kijelöltek törlése</button>";
    $valasz .= "<table class='admin-table'>
                    <thead>
                        <tr>
                            <th><input type='checkbox' onclick=\"valt(this, 'talaltfelh')\"></th>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Név</th>
                            <th>Jog</th>
                        </tr>
                    <thead>";
            $keresett = $_POST['mit'];
            $result = $conn -> query("select * from felhasznalok where nev like '%$keresett%' or email like '%$keresett%'");
            if ($result -> num_rows == 0){
                $valasz .= "<tr><td colspan='5'>Nincs elérhető felhasználó!</td></tr>";
            }   else {
            while ($row = $result -> fetch_array()){
                if ($row['id'] != $_SESSION['id']){
                $valasz .= "<tr>
                                <td><input type='checkbox' value='".$row['id']."' name='talaltfelh'></td>
                                <td>".$row['id']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['nev']."</td>
                                <td>";
                                    if($row['jog'] == 0){
                                        $valasz .= "<select style='width: 160px;' id='".$row['id']."' onchange='jogvaltoztat(this.id, this.value)'><option value='0' selected>Normál</option><option value='1'>Admin</option><option value='2'>Felfüggesztett</option></select></td></tr>";
                                    }
                                    if($row['jog'] == 1){
                                        $valasz .= "<select style='width: 160px;' id='".$row['id']."' onchange='jogvaltoztat(this.id, this.value)'><option value='0'>Normál</option><option value='1' selected>Admin</option><option value='2'>Felfüggesztett</option></select></td></tr>";
                                    }
                                    if($row['jog'] == 2){
                                        $valasz .= "<select style='width: 160px;' id='".$row['id']."' onchange='jogvaltoztat(this.id, this.value)'><option value='0'>Normál</option><option value='1'>Admin</option><option value='2' selected>Felfüggesztett</option></select></td></tr>";
                                    }
                        }
                    }
                    $valasz .= "</table>";
            }   
    echo $valasz;
?>