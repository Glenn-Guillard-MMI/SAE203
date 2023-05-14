<?php

$var = $_POST["var_accpt"];
require 'connection_sql.php';

//recup date et mettre des var pour les dates
$sel = "SELECT date_debut, date_fin, reference FROM reservation WHERE numero = $var ; ";
$rsl = mysqli_query($link, $sel);
$row = mysqli_fetch_assoc($rsl);
$ds = $row['date_debut'];
$df = $row['date_fin'];
$ref = $row['reference'];
//mdf autorisation a 1
$query = "UPDATE reservation SET autorisation = 1 where numero = '$var'";
mysqli_query($link, $query);



//update a 2 pour ceux qui on la même date 
$sup = "UPDATE reservation SET autorisation = 2  WHERE ( ((date_debut = '$df' or (date_debut<'$ds' and date_debut>'$df')) or ( date_fin = '$ds' or (date_fin<'$ds' and date_fin>'$df'))) or (date_debut<'$df' and date_fin>'$ds')  and  autorisation = 0 AND reference='$ref')";
mysqli_query($link, $sup);


mysqli_close($link);
?>