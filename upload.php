<?php
    $file = $_FILES['file']['tmp_name'];
    $tipus = mime_content_type($file);

    echo $file."<br>";
    echo $tipus."<br>";


?>