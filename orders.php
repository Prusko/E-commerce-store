<?php 
    include 'core/config.php';
    require_once 'core/header.php';
?>
<body>
    <section class="orders-container">
        <div>
            <h2>Rendeléseim</h2><br>
        <?php 
            $rendelesek = $conn -> query("select * from rendelesek where userid=".$_SESSION['id']." order by datum DESC");
            if ($rendelesek -> num_rows == 0){
                echo "Nincs rendeles";
            }   else {
            while ($row = $rendelesek -> fetch_array()){
                ?>
                <div id='ord<?php echo $row['id']; ?>' class="order-box" onclick="ordertartkiir(<?php echo $row['id']; ?>)">
                <?php
                echo "<strong>Rendelés azonosító: ".$row['id'] ."<br>".$row['nev']."</strong> / ".$row['telszam']."<br><b>".$row['email']."</b><br>".$row['cim']."<br>".$row['datum']."<span class='linear'></span>";
                if ($row['szallitas'] == 1){
                    echo "<b>Utánvét</b><br>";
                }
                elseif ($row['szallitas'] == 2){
                    echo "<b>Előre utalás</b><br>";
                }
                elseif ($row['szallitas'] == 3) {
                    echo "<b>Helyben átvétel</b><br>";
                }
                
                $rendeles = $conn -> query("SELECT aru.nev, rendeles.db from aru, rendeles where aru.id=rendeles.aruid and rendeles.rendid=".$row['id']);
                while ($termek = $rendeles -> fetch_array()){
                    echo "- ".$termek['nev']." - ".$termek['db']." db<br>";
                }
                if ($row['allapot'] == 0){
                    echo "<strong>Megrendelve</strong>";
                }
                if ($row['allapot'] == 1){
                    echo "<strong>Kiszállítás</strong>";
                }
                if ($row['allapot'] == 2){
                    echo "<strong>Rendezve</strong>";
                }
                ?>
                </div>
                <?php
            }   
        }
        ?>
    </div>
    <div class="ordertarthelye">
        <div class="ordertart">
            <h2>Rendelés tartalma</h2><br>
            <div class="ordertartkiir" id="ordertart">
                <b>Kattintson a megnézendő rendelésre.</b>
            </div>
        </div>
    </div>
    </section>
</body>
<?php 
    require_once 'core/footer.php';
?>