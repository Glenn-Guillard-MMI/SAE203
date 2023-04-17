<?php


require "connection_sql.php";
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['pwd'] = $_POST['password'];

if (!empty($_SESSION['email']) and !empty($_SESSION['pwd'])) {

    $email = $_SESSION['email'];
    $password = hash("sha256", $_SESSION['pwd'], false);
    $query = "SELECT first_name, last_name FROM users WHERE email='$email' AND password ='$password';";
    $rsl = mysqli_query($link, $query);

    if (mysqli_num_rows($rsl) == 1) {
        mysqli_close($link);
        header("Location: accueil.php");
        exit();

    } else {
        mysqli_close($link);
        header("Location: index.php");
        exit();
    }
} else {
    mysqli_close($link);
    header("Location: index.php");
    exit();
}