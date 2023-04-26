<?php
session_start();
if (!empty($_POST['nom']) && !empty($_POST['reference']) && !empty($_POST['type']) && !empty($_POST['description'])) {
    //Récup de toutes les données pour les mettre en session
    $_SESSION['nom_mat'] = $_POST['nom'];
    $_SESSION['reference_mat'] = $_POST['reference'];
    $_SESSION['type_mat'] = $_POST['type'];
    $_SESSION['description_mat'] = $_POST['description'];
    $email = $_SESSION['email'];



    // Lancement de SQL
    require 'connection_sql.php';
    $query = "SELECT admin FROM users WHERE email='$email' ;";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);


    //Récupe de toute les fonction
    require 'fonction.php';

    //Vérif nom du matériel
    if (car_interdit($_SESSION['nom_mat'])) {
        $_SESSION["msg_nom_mat"] = "Le nom du matériel ne doit pas possèder de caractère spéciaux";
    } else {
        $_SESSION["msg_nom_mat"] = null;
    }

    if (!verif_list($_SESSION['type_mat'], ["Caméra", "Micro", "Light"])) {
        $_SESSION["msg_type_mat"] = "Le type du matériel n'est pas valide";
    } else {
        $_SESSION["msg_type_mat"] = null;
    }




    if (isset($_SESSION["msg_nom_mat"]) || isset($_SESSION["msg_reference_mat"]) || isset($_SESSION["msg_type_mat"])) {

        header("Location: new_materiel.php");
        mysqli_close($link);
        exit();
    } else {
        $nom = $_POST['nom'];
        $reference = $_POST['reference'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $query = "INSERT INTO materiel (reference, nom, type, description) VALUES ('$reference', '$nom', '$type', '$description') ;";
        mysqli_query($link, $query);
        header("Location: new_materiel.php");
        exit();

    }

} else {
    $_SESSION['nom_mat'] = $_POST['nom'];
    $_SESSION['reference_mat'] = $_POST['reference'];
    $_SESSION['type_mat'] = $_POST['type'];
    $_SESSION['description_mat'] = $_POST['description'];
    header("Location: new_materiel.php");
    mysqli_close($link);
    exit();
}






?>