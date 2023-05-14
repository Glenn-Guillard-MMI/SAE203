<?php
session_start();



if (!empty($_POST["date_first"]) && !empty($_POST["date_second"])) {
    require "fonction.php";
    if (verif_date_mat($_POST["date_first"], $_POST["date_second"])) {
        $df = $_POST["date_first"];
        $ds = $_POST["date_second"];
        $ref = $_SESSION["ref_mat_cmd"];
        require "connection_sql.php";
        $sve = "SELECT * FROM reservation  WHERE ( (((date_debut = '$df' or (date_debut<'$ds' and date_debut>'$df')) or ( date_fin = '$ds' or (date_fin<'$ds' and date_fin>'$df'))) or (date_debut<'$df' and date_fin>'$ds') ) and  autorisation = 1 AND reference='$ref')";
        $result = mysqli_query($link, $sve);
        $nb_res = mysqli_num_rows($result);

        if ($nb_res == 0) {

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
            $_SESSION["message_good_verif_mat"] = "Votre demande a bien était enregistrer";
            exit();
        } else {
            header("Location:reservation.php");
            $_SESSION["message_err_verif_mat"] = "Ce matériel à déjà était resever de ce créneaux";

            exit();
        }



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