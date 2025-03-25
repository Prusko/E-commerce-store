<?php 
    require_once 'core/header.php';
    include 'core/config.php';
    if ($_SESSION['jog'] != 1){
        header('location:index.php');
    }
?>
<body>
    <i class='bx bx-right-arrow-alt' id='bx-right-arrow-alt' onclick="sidebarkinyit()"></i>
    <div class="sidebar" id="sidebar">
        <i class='bx bx-x' onclick="sidebarbecsuk()"></i>
        <div class="header">
            <img src="images/admin-icon.png" alt="admin-icon"><br>
            Üdv, <?php echo $_SESSION['nev'];?>.
            <span class="linear"></span>
        </div>
        <ul>
            <li><a href="admin.php"><i class='bx bxs-dashboard'></i> Irányítópult</a></li>
            <li><a onclick="users(); sidebarbecsuk();"><i class='bx bx-group'></i> Felhasználók</a></li>
            <li><a onclick="termek(); sidebarbecsuk();"><i class='bx bx-list-ul'></i> Termékek</a></li>
            <li><a onclick="category(); sidebarbecsuk();"><i class='bx bx-duplicate'></i> Kategóriák</a></li>
            <li><a onclick="rendelesek(); sidebarbecsuk();"><i class='bx bxs-wallet-alt'></i> Rendelések</a></li>
        </ul>
    </div>
    <div id="content">
        <div class="row">
            <a onclick="users()">
                <div class="col">
                    <div class="card">
                        <i class='bx bx-group'></i>
                        <h4>Összes felhasználó</h4>
                        <h5>
                            <?php 
                            $result = $conn -> query("select id from felhasznalok");
                            $count = 0;
                            while ($row = $result -> fetch_array()){
                                $count += 1;
                            }
                            echo $count;
                            ?>
                    </h5>
                </div>
            </div>
        </a>
        <a onclick="termek()">
        <div class="col">
            <div class="card">
                <i class='bx bx-list-ul'></i>
                <h4>Összes termék</h4>
                <h5>
                <?php 
                        $result = $conn -> query("select id from aru");
                        $count = 0;
                        while ($row = $result -> fetch_array()){
                            $count += 1;
                        }
                        echo $count;
                    ?>
                </h5>
            </div>
        </div>
        </a>
        <a onclick="category()">
            <div class="col">
                <div class="card">
                    <i class='bx bx-duplicate'></i>
                    <h4>Összes kategória</h4>
                    <h5>
                    <?php 
                            $result = $conn -> query("select id from kategoria");
                            $count = 0;
                            while ($row = $result -> fetch_array()){
                                $count += 1;
                            }
                            echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            </a>
            <a onclick="rendelesek()">
            <div class="col">
                <div class="card">
                    <i class='bx bxs-wallet-alt'></i>
                    <h4>Összes rendelés</h4>
                    <h5>
                    <?php 
                            $result = $conn -> query("select id from rendelesek");
                            $count = 0;
                            while ($row = $result -> fetch_array()){
                                $count += 1;
                            }
                            echo $count;
                        ?>
                    </h5>
                </div>
            </div>
            </a>
        </div>
    </div>
</body>
</html>