<?php
$sup = $_POST["var_sup"];
session_start();

require "connection_sql.php";
$query = "SELECT * FROM materiel WHERE reference='$sup'";
$all = mysqli_query($link, $query);
$_SESSION["test"] = $all->fetch_all(MYSQLI_ASSOC);



mysqli_close($link);
exit;