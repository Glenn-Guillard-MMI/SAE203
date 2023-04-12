
<form id="formulaire" action='testeur.php' method='post'>

<input class="champ" type="date" name="birth">
<input type = "submit">

</form>

<?php



if ( isset($_POST['birth']) && !strtotime($_POST['birth']) == TRUE )
    {
        echo "lalalalala";
        exit();   
    }
?>