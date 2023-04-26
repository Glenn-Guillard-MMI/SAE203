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


    $link = mysqli_connect("localhost", "root", "", "bdd_sae");
    $query = "SELECT * FROM materiel LIMIT 30 ;";
    $result = mysqli_query($link, $query);
    echo "<form action='materiel_dispo.php' method='post'>";
    echo " <table border=1>";
    echo " <tr> <th> nom </th> <th> type </th> <th> reference </th> <th> description </th> </tr>";
    $nombre = "a";
    while ($row = mysqli_fetch_assoc($result)) {

        $_SESSION[$nombre] = $row['reference'];
        echo " <tr> <td>", $row['nom'], "</td><td> ", $row['type'], "</td> <td>", $row['reference'], "</td> <td>", $row['description'], "</td> <td> <button >X</button> </td> </tr> ";
        echo $nombre;
        $nombre++;
    }
    echo " </table>";
    echo "</form>";


    mysqli_close($link);
    ?>

    <?php


    ?>
</body>

</html>