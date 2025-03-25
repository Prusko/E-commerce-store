<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
        if ($_SESSION['jog'] == 1){
            $mit = $_POST['mit'];
            $category = $conn -> query("select * from kategoria where id =".$mit);
            $rowcategory = $category -> fetch_array();
            $valasz = "";
            $valasz .= "
                <div class='additem'>
                <h4>Kategória szerkesztése</h4>
                Kategória neve:<br>
                    <form method='post' action='ajax/updatecategory.php'>
                        <input type='text' class='category' style='font-size: 30px;' name='categoryvalue' value=".$rowcategory[1].">
                        <input type='hidden' name='categoryid' value='$mit' style='display: none;'><br>
                        <input type='submit' name='upload' class='editbtn' value='Kategória frissítése'>
                    </form><button class='torolbtn' onclick='category()'>Mégse</button>
                </div>

            ";
            echo $valasz;
        }
    }
?>