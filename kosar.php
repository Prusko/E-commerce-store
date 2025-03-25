<?php 
    require_once 'core/header.php';
    include 'core/config.php';
    if (!isset($_SESSION['id'])){
        header('location:index.php');
    }
?>
<div id="kosarkiir">
    <script>
        kosarkiir()
    </script>
</div>
<?php 
    require_once 'core/footer.php';
?>