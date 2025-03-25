<?php 
    require_once 'core/header.php';
    include 'core/config.php';
    if (isset($_SESSION['email'])){
        header('location: index.php');
    }

    if (isset($_POST['submit'])){
        $email = $_POST['email'];
        $pwd = sha1($_POST['pwd']);
        if (empty($email)){
            $error = "Hiányzó adat!";
        } elseif (empty($pwd)){
            $error = "Hiányzó adat!";
        }   else{
            $select = "select * from felhasznalok where email='$email' and jelszo='$pwd'";
            $result = $conn -> query($select);
            if ($result -> num_rows == 0){
                $error = "Hibás email-t vagy jelszót adtál meg!";
            }   else {
                $row = $result -> fetch_array();
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nev'] = $row['nev'];
                $_SESSION['jog'] = $row['jog'];
                if ($row['jog'] == 2){
                    header('location:felfugg.php');
                }
                else {
                    header('location:index.php');
                }
            }
        }
    }
?>
<body>
<div class="form-container">
        <form action="" method="POST">
            <h3>Bejelentkezés</h3>
                <?php 
                if (isset($error)){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
                ?>
            <input type="email" required name="email" placeholder="Email" pattern="[a-zA-Z0-9\.-_]{1,}@[a-zA-Z0-9\.-_]{1,}.(com|hu)" size="40" maxlength="40"><br>
            <input type="password" required id="pwd" name="pwd" placeholder="Jelszó"><br>
            <input type="submit" id="submit" name="submit" value="Bejelentkezés" class="form-btn"><br>
            <p>Nincs fiókja? <a href="regist.php">Regisztráció</a></p>
        </form>
    </div>
<?php 
    require_once 'core/footer.php';
?>
</body>
</html>