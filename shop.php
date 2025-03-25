<?php 
    require_once 'core/header.php';
    include 'core/config.php';
?>
<div id="alert">Sikeresen bekerült a kosárba! <i class='bx bx-x' onclick="alertbecsuk()"></i></div>
<section class="shop" id="shop">
    <h2>Szűrés</h2>
    <div class="szures">
        Kategória: <select id="cat" onchange="lista()">
            <option value="0">Minden</option>
            <?php 
                $cat = $conn -> query("select * from kategoria");
                while ($row = $cat -> fetch_array()){
                    echo "<option value='".$row['id']."'>".$row['megnevezes']."</option>";
                }
            ?>
        </select>
        <input type="number" min="0" id="min" placeholder="Min" onchange="lista()"> - <input type="number" min="0" id="max" placeholder="Max" onchange="lista()">
    </div>
        <div id="lista">
        <div class="container">
            <?php 
                $result = $conn -> query("select * from aru");
                while($row = $result -> fetch_array()){
                    if ($row['elerheto']){
                        echo "<div class='box'><a href='view_page.php?id=\"".$row['id']."\"'>
                        <img src='kepnezo.php?id=\"".$row['id']."\"' alt='".$row['nev']."'>
                        <h4>".$row['nev']."</h4>
                        <h5>".number_format($row['ar'], 0, '', ' ')." Ft</h5>
                        <input type='hidden' value='1'id='".$row['id']."'>
                        <div class='cart'>";
                            if (isset($_SESSION['email'])){
                                echo "<a href='#nav' onclick='kosarba(".$row['id'].")'><i class='bx bx-cart'></i></a>";
                                }
                        echo "</div>
                        <div class='view'>
                            <a href='view_page.php?id=\"".$row['id']."\"'><i class='bx bx-show' ></i></a>
                        </div>
                    </a></div>";
                    }
                }
            ?>
        </div>
        </div>
    </section>
<?php 
    require_once 'core/footer.php';
?>