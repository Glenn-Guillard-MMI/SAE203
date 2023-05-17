<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/demande.css">
    <title>Mes demandes</title>
</head>

<body>
    <?php
    require "header.php";

    // Vérification si la personne est connecter
    if (!isset($_SESSION["email"])) {
        header("LOCATION:index.php");
    }




    require "connection_sql.php";
    $email = $_SESSION['email'];
    $query = "SELECT m.nom, r.reference, r.date_debut, r.date_fin, r.autorisation FROM reservation as r JOIN materiel as m on m.reference = r.reference JOIN users as u on u.email = r.email WHERE u.email = '$email' ORDER BY r.numero DESC; ";
    $result = mysqli_query($link, $query);
    echo "<div id='div_table_demande'>";
    echo " <table id='table_demande'>";
    echo " <tr id='premiere_ligne'> <th> nom produit </th> <th> reference </th> <th> date debut </th><th> date fin </th><th> validation </th></tr>";
    $nombre = "a";
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION[$nombre] = $row['reference'];
        echo "<tr class='espace'><td></td></tr>";
        echo " <tr> <td>", $row['nom'], "</td><td> ", $row['reference'], "</td> <td>", $row['date_debut'], "</td> <td>", $row['date_fin'], "</td>";
        if ($row['autorisation'] == 1) {
            echo "<td class='accepte'> Accepté </td>";
        } elseif ($row['autorisation'] == 0) {
            echo "<td class='attente'> En attente </td>";
        } else {
            echo "<td class='refuse'> Refusé </td>";
        }


        echo "</tr> ";
        echo "<tr class='espace'><td></td></tr>";
        $nombre++;
    }
    echo " </table>";
    echo "</div>";

    mysqli_close($link);
    ?>
    <?php require "footer.html" ?>

</body>

</html>