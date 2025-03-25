<div id="alert">Sikeresen bekerült a kosárba! <i class='bx bx-x' onclick="alertbecsuk()"></i></div>
<?php 
    require_once 'core/header.php';
    include 'core/config.php';
    
    $id = $_GET['id'];
    $result = $conn -> query("select * from aru where id = $id");
    $row = $result -> fetch_array();
    $cat = $conn -> query("select megnevezes from kategoria where id=".$row['kategoriaid']);
    $catrow = $cat -> fetch_array();

    if (isset($_POST['submit'])){
                    $velemeny = $_POST['review'];
                    $rate = $_POST['rate'];
                    $termekid = $row['id'];
                    $userid = $_SESSION['id'];
                    if (!empty($velemeny) and !empty($rate)){
                        $conn -> query("INSERT INTO `velemeny`(`termekid`, `userid`, `velemeny`, `csillag`) VALUES ('$termekid','$userid','$velemeny','$rate')");
                    }
                    
                }
    if (isset($_POST['submit2'])){
            $mit = $_POST['mit'];
            $velemeny = $_POST['review'];
            $rate = $_POST['rate'];
            $termekid = $row['id'];
            $userid = $_SESSION['id'];
            if (!empty($velemeny) and !empty($rate)){
                $conn -> query("UPDATE `velemeny` SET `termekid`='".$termekid."',`userid`='".$userid."',`velemeny`='".$velemeny."',`csillag`='".$rate."' where id =".$mit);
            }
                    
        }
?>
<div class="items">
    <div class="kep">
        <?php echo "<img src='kepnezo.php?id=\"".$row['id']."\"' alt='".$row['nev']."'>"?>
    </div>
    <div class="main">
        <h4><?php echo $row['nev'];?></h4>
        <?php 
            $csillags = $conn -> query("select csillag from velemeny where termekid=".$row['id']); 
            if ($csillags -> num_rows > 0){
            $osszes = 0;
            $db = 0;
            while ($csillag = $csillags -> fetch_array()){
                $osszes += $csillag['csillag'];
                $db += 1;
            }
            echo "<div style='font-size: 2rem; margin-bottom: 20px;'><i class='bx bxs-star' style='color: #f1c40f; margin-bottom: 10px; font-size: 2rem;'></i>".round($osszes/$db, 2)."</div>";
        }   else {
            echo "<div style='font-size: 1.6rem; margin-bottom: 20px;'><i class='bx bxs-star' style='color: #f1c40f; margin-bottom: 10px; font-size: 2rem;'> </i>Nem értékelték még.</div>";
        }
        ?>
        <p><?php echo $row['leiras'];?></p>
        <h5><?php echo $row['ar'];?> Ft</h5>
        <h5>Kategória: <?php echo $catrow['megnevezes'];?></h5>
        <?php 
            if (isset($_SESSION['email'])){
                ?>
            <input type="number" id="<?php echo $row['id'];?>" class="number" min="0" value="0" max="99"><br>
            <a href='#nav' onclick="kosarba(<?php echo $row['id'];?>)" id="kosarbtn"><i class='bx bx-cart'></i> Kosárba tesz</a>
                <?php
            }   else {
                ?>
                Jelentkezzen be, hogy vásárolni tudjon.
                <?php
            }
        ?>
    </div>
</div>
            <h2 style="text-align: center; margin-bottom: 30px;">Hasonló termékek</h2>
            <div style="display: flex; justify-content: space-between; align-items: center;">
            <i class='bx bxs-left-arrow' onclick="balratermek()"></i>
            <div class="hasonlo-termek" id='box'>
                <?php 
                    $hasonloselect = $conn -> query("SELECT * from aru WHERE aru.kategoriaid =".$row['kategoriaid']." and aru.id <> ".$id);
                    while($hasonlo = $hasonloselect -> fetch_array()){
                        if ($hasonlo['elerheto']){
                            echo "<div class='box'><a href='view_page.php?id=\"".$hasonlo['id']."\"'>
                            <img src='kepnezo.php?id=\"".$hasonlo['id']."\"' alt='".$hasonlo['nev']."'>
                            <h4>".$hasonlo['nev']."</h4>
                            <h5>".number_format($hasonlo['ar'], 0, '', ' ')." Ft</h5>
                            <input type='hidden' value='1'id='".$hasonlo['id']."'>
                            <div class='cart'>";
                                if (isset($_SESSION['email'])){
                                    echo "<a href='#nav' onclick='kosarba(".$hasonlo['id'].")'><i class='bx bx-cart'></i></a>";
                                    }
                            echo "</div>
                            <div class='view'>
                                <a href='view_page.php?id=\"".$hasonlo['id']."\"'><i class='bx bx-show' ></i></a>
                            </div>
                        </a></div>";
                        }
                    }
                ?>
            </div>
            <i class='bx bxs-right-arrow' onclick="jobbratermek()"></i>
            </div>
            

<span class="linear2"></span>

    <div class="velemeny-container">
        <h2>Megjegyzések</h2>
    <?php 
    if (isset($_SESSION['email'])){
        $irhate = $conn -> query("select userid from velemeny where termekid=".$row['id']." and userid=".$_SESSION['id']);
        if ($irhate -> num_rows == 0){
            ?>
            <div class="review" id="review">
                <form action="" method="post">
                <div class="stars">
                    <input type="radio" name="rate" required id="rate-5" value="5">
                    <label for="rate-5" class="bx bxs-star"></label>
                    <input type="radio" name="rate" required id="rate-4" value="4">
                    <label for="rate-4" class="bx bxs-star"></label>
                    <input type="radio" name="rate" required id="rate-3" value="3">
                    <label for="rate-3" class="bx bxs-star"></label>
                    <input type="radio" name="rate" required id="rate-2" value="2">
                    <label for="rate-2" class="bx bxs-star"></label>
                    <input type="radio" name="rate" required id="rate-1" value="1">
                    <label for="rate-1" class="bx bxs-star"></label>
                </div>
                <textarea name="review" class="review-box" cols="40" rows="5" maxlength="200" required placeholder="Írj véleményt!"></textarea><br>
                <input type="submit" name="submit" id="submit">
            </form>
            </div>
            <?php 
            
        }
    }
    $velemeny = $conn -> query("select * from velemeny where termekid=".$row['id']." and userid=".$_SESSION['id']);
        if ($velemeny -> num_rows > 0){
            while ($sajvelrow = $velemeny -> fetch_array()){
                $profil = $conn -> query("select nev from felhasznalok where id=".$sajvelrow['userid']);
                $profilrow = $profil -> fetch_array();
                ?>
                <div class="velemeny-box" id="velemeny-box">
                    <div class="profilnev">
                        <strong><?php echo $profilrow['nev']?></strong>
                        <div class="velemeny-date">
                            <?php 
                                echo $sajvelrow['ido'];
                            ?>
                        </div>
                    </div>
                    <div>
                    <?php 
                        for ($i = 0; $i < $sajvelrow['csillag']; $i++){
                            echo "<i class='bx bxs-star' style='color: #f1c40f; margin-bottom: 10px; font-size: 20px;'></i>";
                        }
                    ?>
                    </div>
                    <p class="velemeny-text">
                        <?php echo $sajvelrow['velemeny'];?>
                    </p>
                    <div style="display: flex; justify-content: space-between;">
                        <button class="editbtn" onclick="velemenymodosit(<?php echo $sajvelrow['id'].', '. $row['id']; ?>)">Módosítás</button>
                        <button class="torolbtn" onclick="velemenytorol(<?php echo $sajvelrow['id'].', '. $row['id'];?>)">Törlés</button>
                    </div>
                </div>          
            <?php }
        }  
        
    
        $velemeny = $conn -> query("select * from velemeny where termekid=".$row['id']." and userid!=".$_SESSION['id']." order by ido DESC");
        if ($velemeny -> num_rows > 0){
            while ($velrow = $velemeny -> fetch_array()){
                $profil = $conn -> query("select nev from felhasznalok where id=".$velrow['userid']);
                $profilrow = $profil -> fetch_array();
                ?>
                <div class="velemeny-box">
                    <div class="profilnev">
                        <strong><?php echo $profilrow['nev']?></strong>
                        <div class="velemeny-date">
                            <?php 
                                echo $velrow['ido'];
                            ?>
                        </div>
                    </div>
                    <div>
                    <?php 
                        for ($i = 0; $i < $velrow['csillag']; $i++){
                            echo "<i class='bx bxs-star' style='color: #f1c40f; margin-bottom: 10px; font-size: 20px;'></i>";
                        }
                    ?>
                    </div>
                    <div class="velemeny-text">
                        <?php echo $velrow['velemeny'];?>
                    </div>
                </div>          
            <?php }
        }
        $velemeny = $conn -> query("select id from velemeny where termekid=".$row['id']);
        if ($velemeny -> num_rows == 0){
            echo "<div class='velemeny-none'>Még nem írtak véleményt erre a termékre</div>";
        }
        
    ?>  
    </div>

<?php 
    require_once 'core/footer.php';
?>