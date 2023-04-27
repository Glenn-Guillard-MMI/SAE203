<?php
$sup = $_POST["var_sup"];
require "connection_sql.php";
$query = "DELETE FROM materiel WHERE reference='$sup'";
mysqli_query($link, $query);
mysqli_close($link);
exit;