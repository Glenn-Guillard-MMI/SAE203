<?php

require "connection_sql.php";
$ref = $_POST['var_mdf'];
$query = "SELECT * FROM materiel where reference = '$ref';";

$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
session_start();
$_SESSION['ref_mdf'] = $row['reference'];
$_SESSION['nom_mdf'] = $row['nom'];
$_SESSION['type_mdf'] = $row['type'];
$_SESSION['description_mdf'] = $row['description'];
$_SESSION["message_err_verif_mat"] = null;