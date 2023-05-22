<?php
session_start();
if (!empty($_POST['nom']) && !empty($_POST['type']) && !empty($_POST['description'])) {
    //Récup de toutes les données pour les mettre en session
    $_SESSION['nom_mdf'] = $_POST['nom'];
    $_SESSION['type_mdf'] = $_POST['type'];

    //$_SESSION['img_mdf'] = $_POST['image'];
    $_SESSION['description_mdf'] = $_POST['description'];



    //Récupe de toute les fonction
    require 'fonction.php';

    //Vérif nom du matériel
    if (car_interdit($_SESSION['nom_mdf'])) {
        $_SESSION["msg_nom_mdf"] = "Le nom du matériel ne doit pas possèder de caractère spéciaux";
    } else {
        $_SESSION["msg_nom_mdf"] = null;
    }

    //Vérif type du matériel
    if (!verif_list($_SESSION['type_mdf'], ["Caméra", "Micro", "Light"])) {
        $_SESSION["msg_type_mdf"] = "Le type du matériel n'est pas valide";
    } else {
        $_SESSION["msg_type_mdf"] = null;
    }




    if (isset($_SESSION["msg_nom_mdf"]) || isset($_SESSION["msg_reference_mat"]) || isset($_SESSION["msg_type_mdf"])) {

        header("Location: modification_mat.php");
        mysqli_close($link);
        exit();


    } else {
        require "connection_sql.php";
        $nom = $_POST['nom'];
        $type = $_POST['type'];
        $description = htmlspecialchars($_POST['description']);
        $reference = $_SESSION['ref_mdf'];
        $query = "UPDATE materiel SET nom = '$nom',type = '$type',description = '$description' Where reference = '$reference'";
        echo $query;
        mysqli_query($link, $query);
        header("Location: materiel_dispo.php");
        unset($_SESSION['nom_mdf']);
        unset($_SESSION['type_mdf']);
        unset($_SESSION['description_mdf']);
        unset($_SESSION['reference_mat']);
        mysqli_close($link);
        exit();

    }

} else {
    $_SESSION['nom_mdf'] = $_POST['nom'];
    $_SESSION['reference_mat'] = $_POST['reference'];
    $_SESSION['type_mdf'] = $_POST['type'];
    $_SESSION['description_mdf'] = $_POST['description'];
    //$_SESSION['img_mat'] = $_POST['image'];
    header("Location: modification_mat.php");
    mysqli_close($link);
    exit();
}






?>