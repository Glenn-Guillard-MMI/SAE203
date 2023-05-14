<?php

$var = $_POST["var_ref"];
require 'connection_sql.php';
//mdf autorisation a 1
$query = "UPDATE reservation SET autorisation = 2 where numero = '$var'";
mysqli_query($link, $query);

mysqli_close($link);