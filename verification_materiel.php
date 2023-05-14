<?php
session_start();



if (!empty($_POST["date_first"]) && !empty($_POST["date_second"])) {
    require "fonction.php";
    if (verif_date_mat($_POST["date_first"], $_POST["date_second"])) {


        require "connection_sql.php";
        $mail = $_SESSION["email"];
        $ref = $_SESSION["ref_mat_cmd"];
        $_SESSION["date_f"] = $_POST["date_first"];
        $dtf = $_POST["date_first"];
        $_SESSION["date_s"] = $_POST["date_second"];
        $dte = $_POST["date_second"];
        $query = "INSERT INTO reservation (email, reference, date_debut, date_fin, autorisation) VALUES ('$mail', '$ref', '$dtf', '$dte', '0')";
        mysqli_query($link, $query);
        mysqli_close($link);
        header("Location:reservation.php");
        $_SESSION["message_good_verif_mat"] = "votre réservation a bien était prise en compte";
        exit();
    } else {
        header("Location:reservation.php");
        $_SESSION["message_err_verif_mat"] = "Veulliez vérifier vos date";

        exit();
    }
} else {
    header("Location:reservation.php");
    $_SESSION["message_err_verif_mat"] = "Veulliez remplir toute les information";

}
?>