<?php 
    require_once 'core/header.php';
    include 'core/config.php';
    $kosartomb = unserialize($_COOKIE['kosar'.$_SESSION['id']]);
    
    $osszeg = 0;
    for ($i = 0; $i < count($kosartomb); $i++){
        $select = $conn -> query("select ar from aru where id=".$kosartomb[$i][0]);
        $select = $select -> fetch_array(); 
        $osszeg += $select['ar']*$kosartomb[$i][1];
    }
    $vegosszeg = round($osszeg*0.27/5)*5+$osszeg;

    if (isset($_POST['submit'])){
        if ($_POST['szallitas'] == 4){
            $error = "Válassz ki egy szállítási módot";
        }
        else {
            if ($_POST['szallitas'] == 1 || $_POST['szallitas'] == 2){
                $szallitasosszeg = 1685;
            }
            elseif ($_POST['szallitas'] == 3){
                $szallitasosszeg = 0;
            }

            $vegosszeg += $szallitasosszeg;

            $vnev = $_POST['vnev'];
            $knev = $_POST['knev'];
            $email = $_POST['email'];
            $telszam = $_POST['telszam'];
            $nev = $vnev." ".$knev;
            $irszam = $_POST['irszam'];
            $varos = $_POST['varos'];
            $cim = $_POST['irszam']." ".$_POST['varos']." ".$_POST['utca'];
            $szallitas = $_POST['szallitas'];
            $id = $_POST['id'];
            $conn -> query("insert into rendelesek (userid, nev, cim, email, telszam, szallitas, osszeg, allapot) values ('$id' ,'$nev', '$cim', '$email', '$telszam', '$szallitas', '$vegosszeg', 0)");
            $id = mysqli_insert_id($conn);
            for($i =0; $i < count($kosartomb); $i++){
                $termekid = $kosartomb[$i][0];
                $db = $kosartomb[$i][1];
                $sql = "insert into rendeles values (0, $id, $termekid, $db)";
                $conn -> query($sql);
                echo "<script>alert('Rendelés leadva.')</script>";
                setcookie('kosar'.$_SESSION['id'], "", 0, "/");
                header('location:index.php');
            }
        }
    }
?>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Rendelési adatok</h3>
                <?php 
                if (isset($error)){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
                ?>                
            <div class="checkout">
                <div>
                    <select name="szallitas" onchange="szallitasvaltoz(this.value, <?php echo $vegosszeg ?>)" style='font-size: 1.2rem; text-align: center; padding: 5px;, border: none;' id='select'>
                            <option value="4" required selected>Válassz szállítási módot</option>
                            <option value="1">Utánvét (1 685 Ft szállítási díj)</option>
                            <option value="2">Előre utalás (1 685 Ft szállítási díj)</option>
                            <option value="3">Helyben átvétel (Ingyenes)</option>
                    </select>
                </div>
                <div class="checkout-form">
                    <input type="text" required name="vnev" placeholder="Vezetéknév">
                    <input type="text" required name="knev" placeholder="Keresztnév"><br>
                </div>
                <input type="email" pattern="[a-zA-Z0-9\.-_]{1,}@[a-zA-Z0-9\.-_]{1,}.(com|hu)" required name="email" placeholder="Email cím">
                <input type="tel" required name="telszam" placeholder="Telefonszám">
                <div class="checkout-form">
                    <input type="number" required name="irszam" placeholder="Irányítószám">
                    <input type="text" required name="varos" placeholder="Város">
                </div>
                    <input type="text" required name="utca" placeholder="Cím"><br>
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                </div>
                <?php 
                    echo "<b style='font-size: 20px;'>Végösszeg: <span id='vegosszeg'>".number_format($vegosszeg, 0, '', ' ')."</span> Ft</b>";
                ?>
                    <input type="submit" id="submit" name="submit" value="Rendelés leadása" class="form-btn"><br>
        </form>
    </div>
<?php 
    require_once 'core/footer.php';
?>