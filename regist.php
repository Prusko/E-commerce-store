<?php 
    require_once 'core/header.php';
    include 'core/config.php';

    if (isset($_POST['submit'])){
            $pwd = $conn -> real_escape_string(sha1($_POST['pwd']));
            $cpwd = $conn -> real_escape_string(sha1($_POST['cpwd']));
            $email = $conn -> real_escape_string($_POST['email']);
            $nev = $conn -> real_escape_string($_POST['nev']);

                if (empty($email)){
                    $error = "Hiányzó adat!";
                }   elseif(empty($pwd)) {
                    $error = "Hiányzó adat!";
                }   elseif(empty($cpwd)){
                    $error = "Hiányzó adat!";
                }   elseif(empty($nev)){
                    $error = "Hiányzó adat!";
                }   else {
                if ($pwd != $cpwd){
                    $error = "Nem egyeznek a jelszavak!";
                }   else {
                $select = "select email from felhasznalok where email='$email'";
                $result = $conn -> query($select);
                if ($result -> num_rows > 0){
                    $error = "Már van regisztrálva ez az email!";
                }   else {
                    $conn -> query("insert into felhasznalok values(0, '$email', '$nev', '$pwd', 0)");
                    header('location:login.php');
                }
            }
        }
    }
?>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Regisztrálj most</h3>
                <?php 
                if (isset($error)){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
                ?>
            <input type="email" required name="email" placeholder="Email" pattern="[a-zA-Z0-9\.-_]{1,}@[a-zA-Z0-9\.-_]{1,}.(com|hu)" size="40" maxlength="40"><br>
            <input type="text" required name="nev" placeholder="Név"><br>
            <input type="password" required id="pwd1" name="pwd" placeholder="Jelszó"><br>
            <input type="password" required id="pwd2" name="cpwd" placeholder="Jelszó megerősítése"><br>
            <input type="submit" id="submit" name="submit" value="Regisztráció" class="form-btn"><br>
            <p>Már van fiókja? <a href="login.php">Bejelentkezés</a></p>
        </form>
    </div>
<?php 
    require_once 'core/footer.php';
?>    
</body>
</html>