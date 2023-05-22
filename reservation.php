<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/reservation.css">
    <title>Réservation</title>
</head>

<body>
    <?php require "header.php";
    require "connection_sql.php";
    $email = $_SESSION['email'];
    echo "<div id='container_msg'>";
    if (isset($_SESSION["message_good_verif_mat"])) {
        echo "<p class='message_reserv'>", $_SESSION["message_good_verif_mat"], "</p>";
        unset($_SESSION["message_good_verif_mat"]);
    }
    if (isset($_SESSION["message_err_verif_mat"])) {
        echo "<p class='message_reserv'>", $_SESSION["message_err_verif_mat"], "</p>";
        unset($_SESSION["message_err_verif_mat"]);
    }
    echo "</div>";
    $all = $_SESSION['test'];
    $all = array_shift($all);
    $ref = $all['reference']
        ?>

    <div id="div_reservation_globale">
        <div id="container_info_produit">
            <div id="div_img_reservation">

                <img id="img_reservation" <?php echo "src='images/" . $ref . ".jpg'" ?>
                    alt="camera"><!-- faire attention a l'image-->
            </div>
            <div id="div_info_produit">
                <?php




                echo "<p id='nom_produit'>" . $all['nom'] . "</p>";
                echo "<p class='ligne_info'><span id='reference'>Référence : </span>" . $all['reference'] . "</p>";
                echo "<p class='ligne_info'><span id='type'>Type : </span>" . $all["type"] . "</p>";

                $_SESSION["ref_mat_cmd"] = $all["reference"];
                echo "<p class='ligne_info'><span id='description'>Description : </span><br><br>" . $all["description"] . "</p>";
                ?>
            </div>
        </div>
        <div id="container_reste_info">
            <div id="reservation_date">
                <form action='verification_materiel.php' method="POST">
                    <p id="text_date">Date d'emprunt</p>
                    <input class="form_date" name="date_first" type="date">
                    <input class="form_date" name="date_second" type="date">
            </div>
            <?php
            $query = "SELECT admin FROM users WHERE email='$email' ;";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['admin'] == '1') {
                    echo "<div id='div_boutton_modifier'>";
                    echo "<button id='boutton_modifier' onclick=mdf(" . "'" . $all['reference'] . "'" . ")>Modifier</button>";

                    echo "</div>";
                }
            }
            mysqli_close($link);
            ?>

            <div id="div_boutton_valider">
                <button id="boutton_valider" type="submit">Reservation</button>
            </div>
            </form>

        </div>
    </div>
    <div id="div_retour">
        <a id="button_retour" href="materiel_dispo.php">
            < Retour</a>
    </div>
    <?php
    require "footer.html" ?>
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

    <script src="scripts/modification.js"></script>
</body>

</html>