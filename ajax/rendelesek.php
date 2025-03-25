<?php 
    include '../core/config.php';
    $date = new DateTime();
    $ma = new DateTime();
    $tegnap = (new DateTime()) -> modify('-1 day');
    $valasz = "";
    $valasz .= "<section class='shop' id='shop'>
        <div class='container' style='display: flex; justify-content: center; flex-wrap: wrap;'>";
        $sql = 'SELECT YEAR(datum) AS ev, MONTH(datum) AS honap, DAY(datum) AS nap, COUNT(*) as order_count FROM rendelesek GROUP BY 1, 2, 3 ORDER BY 1, 2, 3 DESC';
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Adatok megjelenítése
                    while ($row = $result->fetch_assoc()) { 
                        $date -> setDate($row['ev'], $row['honap'], $row['nap']);
                        $valasz .= "<div class='rendbox' onclick=\"rendelesekmutat('".$date -> format('Y-m-d')."')\">";
                            if ($date -> format('Y-m-d') == $ma -> format('Y-m-d')) {
                                $valasz .= "<strong>Ma</strong>";
                            } elseif ($date -> format('Y-m-d') == $tegnap -> format('Y-m-d')) {
                                $valasz .= "<strong>Tegnap</strong>";
                            } else {
                                $valasz .= $date -> format('Y-m-d');
                            }
                            $valasz .= "<br> Rendelések: " . $row['order_count'] . "</div>";
                        }
                    } else {
                     $valasz .= "Nincsenek rendelések.";
                 }
            $valasz .= "</div>
        </div>";
    echo $valasz;
?>
