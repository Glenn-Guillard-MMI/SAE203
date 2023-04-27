<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <title>Materiel</title>
</head>

<body>

    <?php
    // Vérification si la personne est connecter
    session_start();
    if (!isset($_SESSION["email"])) {
        header("LOCATION:index.php");
    }


    require "connection_sql.php";
    $query = "SELECT * FROM materiel LIMIT 30 ;";
    $result = mysqli_query($link, $query);
    echo "<form action='materiel_dispo.php' method='post'>";
    echo " <table border=1>";
    echo " <tr> <th> nom </th> <th> type </th> <th> reference </th> <th> description </th> </tr>";
    $nombre = "a";
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION[$nombre] = $row['reference'];
        echo " <tr> <td>", $row['nom'], "</td><td> ", $row['type'], "</td> <td>", $row['reference'], "</td> <td>", $row['description'], "</td> <td> <button onclick= script(", "'", $row['reference'], "'", ")>X</button> </td> </tr> ";
        $nombre++;
    }
    echo " </table>";
    echo "</form>";


    mysqli_close($link);
    ?>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script src="scripts/script_mat_dispo.js"> </script>
</body>

</html>