<?php
if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['birth']) && !empty($_POST['email']) && !empty($_POST['password'])) {
$link = mysqli_connect("localhost","root","","bdd_sae") ;
    $first_name = $_POST['first_name'] ;
 $last_name = $_POST['last_name'] ;
 $birth = $_POST['birth'] ;
 $email = $_POST['email'] ;
 $password = hash("sha256",$_POST['password'], false) ;
 $query = "INSERT INTO users (first_name, last_name, birth, email, password) VALUES ('$first_name', '$last_name', '$birth', '$email', '$password') ;" ;    
 mysqli_query($link, $query) ;
 mysqli_close($link);
session_start();

 $_SESSION["enregistrer"] = "Votre compte a bien était enregister";
 header("Location:connexion.php");
}
else{
session_start();
    $_SESSION['f_name']= $_POST['first_name'] ;
    $_SESSION['l_name']= $_POST['last_name'] ;
    $_SESSION['birth']= $_POST['birth'] ;
    $_SESSION['email']= $_POST['email'] ;
 $_SESSION["message"] = "Une erreure est survenue lors de l'envoie du formulair, <br> try again";
    header("Location:inscription.php");
    
}
?>
