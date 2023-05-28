<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/validation.css">
    <title>Validation</title>
</head>

<body>

    <?php
    require "header.php";


    // Vérification si la personne est connecter
    if (!isset($_SESSION["email"])) {
        header("LOCATION:index.php");
    }




    require "connection_sql.php";
    $query = "SELECT m.nom, r.reference,m.type,u.first_name , r.date_debut, r.date_fin, r.numero FROM reservation as r JOIN materiel as m on m.reference = r.reference JOIN users as u on u.email = r.email WHERE r.autorisation = 0 ORDER BY r.numero; ";
    $result = mysqli_query($link, $query);
    echo "<div id='div_table_validation'>";
    echo " <table id='table1'>";
    echo " <tr class='premiere_ligne'> <th> nom produit </th> <th> reference </th> <th> type </th> <th> nom utilisateur </th> <th> date debut </th><th> date fin </th><th> numero </th><th></th><th></th></tr>";
    $nombre = "a";
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION[$nombre] = $row['reference'];
        echo " <tr> <td>", $row['nom'], "</td><td> ", $row['reference'], "</td> <td>", $row['type'], "</td> <td>", $row['first_name'], "</td> <td>", $row['date_debut'], "</td> <td>", $row['date_fin'], "</td><td>", $row['numero'], "</td>";
        echo "<td> <button class='button_v' onclick= accepter(", "'", $row['numero'], "'", ")>accepter</button> </td>";
        echo "<td> <button class='button_r' onclick= refuser(", "'", $row['numero'], "'", ")>refuser</button> </td>";

        echo "</tr> ";
        $nombre++;
    }
    echo " </table>";
    echo "</div>";

    $query1 = "SELECT m.nom, r.reference, m.type, u.first_name, r.date_debut, r.date_fin, r.numero, r.autorisation FROM reservation as r JOIN materiel as m on m.reference = r.reference JOIN users as u on u.email = r.email WHERE r.autorisation = 1 or r.autorisation = 2 ORDER BY r.numero DESC; ";
    $result = mysqli_query($link, $query1);
    echo "<div id='div_table_validation_fini'>";
    echo " <table id='table2'>";
    echo " <tr class='premiere_ligne'> <th> nom produit </th> <th> reference </th> <th> type </th> <th> nom utilisateur </th> <th> date debut </th><th> date fin </th><th> numero </th><th>Validation</th></tr>";
    $nombre = "a";
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION[$nombre] = $row['reference'];
        echo "<tr class='espace'><td></td></tr>";
        echo " <tr class='ligne_tab'> <td>", $row['nom'], "</td><td> ", $row['reference'], "</td> <td>", $row['type'], "</td> <td>", $row['first_name'], "</td> <td>", $row['date_debut'], "</td> <td>", $row['date_fin'], "</td><td>", $row['numero'], "</td>";
        if ($row['autorisation'] == 1) {
            echo "<td class='validation_a'> Accepté </td>";
        } else {
            echo "<td class='validation_r'> Refusé </td>";
        }
        echo "</tr> ";
        $nombre++;
    }
    echo " </table>";
    echo "</div>";

    mysqli_close($link);


    ?>


    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="scripts/valrefus.js"> </script>
    <?php require "footer.html" ?>


</body>

</html>