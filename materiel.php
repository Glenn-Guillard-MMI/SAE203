<?php
session_start();
$all = $_SESSION['test'];
$all = array_shift($all);
echo $all["nom"];
echo "<br>";
echo $all["type"];
echo "<br>";
echo $all["reference"];
$_SESSION["ref_mat_cmd"] = $all["reference"];
echo "<br>";
echo $all["description"];
?>

<form id="formulaire" action='verification_materiel.php' method='post'>
    <input class="champ" type="date" name="date_first" required="required">
    <input class="champ" type="date" name="date_second" required="required">
    <input type="submit">
</form>