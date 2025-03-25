<?php 
    include '../core/config.php';
    if (isset($_SESSION['email'])){
    $mit = $_POST['mit'];
    $hova = $_POST['hova'];
?>
    <div class="velemeny-container">
    <?php 
    $adatok = $conn -> query("select * from velemeny where id=".$mit);
    $adat = $adatok -> fetch_array();
        ?>
        <div class="review" id="review">
            <form action="" method="post">
            <div class="stars">
                <input type="radio" name="rate" required id="rate-5" value="5" <?php if ($adat['csillag'] == 5){ ?> checked <?php } ?>>
                <label for="rate-5" class="bx bxs-star"></label>
                <input type="radio" name="rate" required id="rate-4" value="4" <?php if ($adat['csillag'] == 4){ ?> checked <?php } ?>>
                <label for="rate-4" class="bx bxs-star"></label>
                <input type="radio" name="rate" required id="rate-3" value="3" <?php if ($adat['csillag'] == 3){ ?> checked <?php } ?>>
                <label for="rate-3" class="bx bxs-star"></label>
                <input type="radio" name="rate" required id="rate-2" value="2" <?php if ($adat['csillag'] == 2){ ?> checked <?php } ?>>
                <label for="rate-2" class="bx bxs-star"></label>
                <input type="radio" name="rate" required id="rate-1" value="1" <?php if ($adat['csillag'] == 1){ ?> checked <?php } ?>>
                <label for="rate-1" class="bx bxs-star"></label>
            </div>
            <textarea name="review" cols="40" rows="5" maxlength="200" required placeholder="Írj véleményt!"><?php echo $adat['velemeny']?></textarea><br>
            <div style='display: flex; align-items: center; justify-content: space-between;'>
                <input type="hidden" name='mit' value='<?php echo $mit;?>'>
                <input type="submit" name="submit2" value='Módosítás' id="submit">
                <button style='background: none;'><a class="torolbtn" style='background: white; border-radius: 5px; margin: 10px; padding: 8px;' href='view_page.php?id=<?php echo $hova; ?>'>Mégse</a></button>
            </div>
        </form>
        </div>
<?php
    }
?>