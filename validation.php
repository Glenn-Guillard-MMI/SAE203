<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <title>Materiel</title>
</head>

<body>

    <?php
    require "header.php";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    // Vérification si la personne est connecter
    if (!isset($_SESSION["email"])) {
        header("LOCATION:index.php");
    }




    require "connection_sql.php";
    $query = "SELECT m.nom, r.reference,m.type,u.first_name , r.date_debut, r.date_fin, r.numero FROM reservation as r JOIN materiel as m on m.reference = r.reference JOIN users as u on u.email = r.email WHERE r.autorisation = 0; ";
    $result = mysqli_query($link, $query);

    echo " <table border=1>";
    echo " <tr> <th> nom produit </th> <th> reference </th> <th> type </th> <th> nom utilisateur </th> <th> date debut </th><th> date fin </th><th> numero </th></tr>";
    $nombre = "a";
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION[$nombre] = $row['reference'];
        echo " <tr> <td>", $row['nom'], "</td><td> ", $row['reference'], "</td> <td>", $row['type'], "</td> <td>", $row['first_name'], "</td> <td>", $row['date_debut'], "</td> <td>", $row['date_fin'], "</td><td>", $row['numero'], "</td>";
        echo "<td> <button onclick= accepter(", "'", $row['numero'], "'", ")>accepte</button> </td>";
        echo "<td> <button onclick= refuser(", "'", $row['numero'], "'", ")>refuser</button> </td>";

        echo "</tr> ";
        $nombre++;
    }
    echo " </table>";



    mysqli_close($link);


    ?>


    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="scripts/valrefus.js"> </script>



</body>

</html>