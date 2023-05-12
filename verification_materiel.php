<?php




require "connection_sql.php";
session_start();
var_dump($_SESSION);
$mail = $_SESSION["email"];
$ref = $_SESSION["ref_mat_cmd"];
$_SESSION["date_f"] = $_POST["date_first"];
$dtf = $_POST["date_first"];
$_SESSION["date_s"] = $_POST["date_second"];
$dte = $_POST["date_second"];
$query = "INSERT INTO reservation (email, reference, date_debut, date_fin, autorisation) VALUES ('$mail', '$ref', '$dtf', '$dte', '0')";
mysqli_query($link, $query);
mysqli_close($link);

?>