<?php

//Ouverture de la session et du sql
require "connection_sql.php";
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['pwd'] = $_POST['password'];


// Vérifie si il y un mail et un mdp rentréenpar l'utilisateur
if (!empty($_SESSION['email']) and !empty($_SESSION['pwd'])) {

    $email = $_SESSION['email'];
    $password = hash("sha256", $_SESSION['pwd'], false);
    $query = "SELECT first_name, last_name FROM users WHERE email='$email' AND password ='$password';";
    $rsl = mysqli_query($link, $query);


    // Vérifie que le mail et le mdp existe dans la base de donnée
    if (mysqli_num_rows($rsl) == 1) {
        mysqli_close($link);
        header("Location: acceuil.php");
        $_SESSION["Token"] = "Oui";
        exit();

    }

    //Revoit si cela est faux
    else {
        mysqli_close($link);
        header("Location: index.php");
        exit();
    }


}

//Renvoie sur la page index si il y a pas de mail et/ou pas de mot de passe
else {
    mysqli_close($link);
    header("Location: index.php");
    $_SESSION["pb_co"] = "votre mail ou votre mot de passe semble incorrect";
    exit();
}