<?php
    require_once './core/config.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css.css">
    <script src="./js.js"></script>
    <script src="./ajax.js"></script>
    <link rel="icon" href="./images/favicon.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
    <title>Fagravir</title>
</head>
<header id="nav">
        <input type="checkbox" id="toggler">
        <label for="toggler" class='bx bx-menu'></label>
        <a href="index.php" class="logo">Fagravir</a>

        <nav class="navbar" id="navbar">
            <a href="index.php">Kezdőlap</a>
            <a href="shop.php">Bolt</a>
            <a href="#footer">Kapcsolat</a>
        </nav>
          
    <div class="jobbaz" style="display: flex; align-items: center;">
        <div class="icons">
            <?php if (isset($_SESSION['email'])){?>
                    <a href="kosar.php" id="kosar"><i class='bx bxs-shopping-bag' ></i><span id="kosarszam"></span></a>
                    <script>kosarszam()</script>
           <?php }?>
        </div>
        <?php 
            if (isset($_SESSION['email'])){
                ?>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo $_SESSION['nev'] ?><i class='bx bx-chevron-down' style='font-size: 2rem;'></i></button>
                        <div class="dropdown-content">
                            <a href="orders.php">Rendeléseim</a>
                            <?php 
                            if ($_SESSION['jog'] == 1){?>
                                <a href="admin.php">Admin</a>
                                <?php }
                        ?>
                        <a href="logout.php">Kijelentkezés</a>
                    </div>
                </div>
                <?php
                }   else {
                    ?>
                    <div>
                    <a href="login.php"><i class='bx bx-log-in' style="font-size: 2rem;"></i></a>
                    </div>
                <?php
            }
        ?>
        </div>
    </header>
<body>
    <div class="felfugg">
        <h1>A fiókod fel lett függesztve!</h1>
    </div>
</body>
<?php 
    require_once 'core/footer.php';
?>