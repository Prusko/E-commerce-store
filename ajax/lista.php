<?php 
    include '../core/config.php';
        $cat = $_POST['kat'];
        $min = $_POST['min'];
        $max = $_POST['max'];
        $valasz = "";
        $select = "select * from aru where 1=1";
        if ($cat > 0){
            $select .= " and kategoriaid=$cat";
        }
        if ($min > 0){
            $select .= " and ar>=$min";
        }
        if ($max > 0){
            $select .= " and ar<=$max";
        }
        
        $result = $conn -> query($select);
        if ($result -> num_rows == 0){
            $valasz = "<h5 style='margin-top: 30px; font-size: 2rem;'>Nincs ilyen termék</h5>";
        }   else {
            $valasz .= "<div class='container'>";         
                while($row = $result -> fetch_array()){
                    $valasz .= "<div class='box'>
                    <img src='kepnezo.php?id=\"".$row['id']."\"' alt='".$row['nev']."'>
                    <h4>".$row['nev']."</h4>
                    <h5>".number_format($row['ar'], 0, '', ' ')." Ft</h5>
                    <input type='hidden' value='1'id='".$row['id']."'>
                    <div class='cart'>";
                        if (isset($_SESSION['email'])){
                            $valasz .= "<a onclick='kosarba(".$row['id'].")'><i class='bx bx-cart'></i></a>";
                            }
                    $valasz .= "</div>
                    <div class='view'>
                        <a href='view_page.php?id=\"".$row['id']."\"'><i class='bx bx-show'></i></a>
                    </div>
                </div>";
                }
        $valasz .= "</div>";
        }
        echo $valasz;
?>