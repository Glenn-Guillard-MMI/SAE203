<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/materiel_dispo.css" />
    <title>Matériel</title>
</head>

<body>

    <?php
    // Vérification si la personne est connecter
    require "header.php";

    if (!isset($_SESSION["email"])) {
        header("LOCATION:index.php");
    }


    require "connection_sql.php";
    $query = "SELECT * FROM materiel LIMIT 30 ;";
    $result = mysqli_query($link, $query);
    $nombre = "a";
    echo "<div class='container_materiel'>";
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION[$nombre] = $row['reference'];
        echo "<div class='container_info_global'>";
        echo "<div class='div_img'>";
        echo '<img class="img_produit" src="data:image/jpg;base64,' . base64_encode($row['image']) . '"height="150" width="150">';
        echo "</div>";
        echo "<div class='container_info'>";
        echo "<div id='nom_produit'>",$row['nom'],"</div><div id='reference'>",$row['reference'],"</div>";
        echo "<div> <button id='button' onclick= script(", "'", $row['reference'], "'", ")>Réserver</button></div></div></div>";
        $nombre++;
    }
    echo "</div>";


    mysqli_close($link);
    require "footer.html";
    ?>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="scripts/dispo.js"> </script>

</body>

</html>