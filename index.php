<div id="alert">Sikeresen bekerült a kosárba! <i class='bx bx-x' onclick="alertbecsuk()"></i></div>
<?php 
    require_once 'core/header.php';
?>
<body>
    <section class="home">
        <div class="home-container">
            <h3>Friss készítés</h3>
            <span>Praktikus és elbűvölő cuccok</span>
            <p>Lézer géppel vágott, 3 és 4 mm-es rétegelt lemezből készült termékek. Minden kategóriában találhatsz ünnephez vagy eseményhez tartózó dekorációt.</p>
            <a href="#shop" class="btn">Vásároljon most</a>
        </div>
        <img src="images/haz2.png" alt="">
    </section>

    <section class="shop indexshop" id="shop">
        <div class="container">
            <?php 
                $result = $conn -> query("SELECT * from aru WHERE elerheto LIMIT 30");
                while($row = $result -> fetch_array()){                    
                        echo "<div class='box'>
                                <a href='view_page.php?id=\"".$row['id']."\"'>
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
                                        <a href='view_page.php?id=\"".$row['id']."\"'><i class='bx bx-show'></i></a>
                                    </div>
                                </a>
                            </div>";
                        }                
            ?>
        </div>
        <?php 
            if (($result -> num_rows) > 3){
                ?>
                    <div id="show-more" onclick="showmore()">
                        <div id="show-more-btn">
                            Mutass többet 
                        </div>
                            <i class='bx bx-right-arrow-alt arrow2' style="position: block;"></i>
                    </div>
                <?php
            }
        ?>
    </section>
    
    <div class="about" id="about">
        <img src="images/favicon.jpg" alt="icon">
        <div class="szoveg">
            <h2>Rólunk</h2>    
            <p>15 éves tapasztalattal rendelkezünk, gondosan válogatjuk össze a kínálatunkat. Folyamatosan bővítjük a termékek listáját az igények szerint. Ajándéktárgyaink nemcsak szépek de hasznosak is.</p>
        </div>
    </div>

    <div class="szallitas-content">
        <h1>Szállítás</h1>
        <div class="szallitas">
            <div class="szallitas-box">
                <h3>Helyben átvétel</h3>
                <p>Lehetőség adódik helyben átvenni a rendelt csomagot, ez esetben nyilván ingyenes a kiszállítás, hiszen nem kell kiszállítani. Lehet jönni házhoz akármelyik időpontban a <a href="nyitvatartas.html"><b>nyitvatartás</b></a> szerint.</p>
            </div>
            <div class="szallitas-box">
                <h3>Utánvétel</h3>
                <p>Az utánvétes csomagot a feladó még a termék kifizetése előtt odaadja a <a href="futarszolgalat.php"><b>futárnak</b></a> vagy a postának, a címzett pedig akkor tudja azt átvenni, ha a csomag megérkezésekor kifizeti a feladó által meghatározott összeget.</p>
            </div>
            <div class="szallitas-box">
                <h3>Előre utalás</h3>
                <p>Átutalásos fizetés esetén a megrendelés vételárát az átvétel előtt kell kiegyenlítened! Amennyiben ezt a  fizetési módot választopd, úgy a rendelési folyamat véglegesítését követően, elektronikusan kapod meg a díjbekérőt.</p>
            </div>
        </div>
    </div>


<?php 
    require_once 'core/footer.php';
?>
</body>
</html>