<?php
if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['birth']) && !empty($_POST['email']) && !empty($_POST['password'])) 

{
        $_SESSION['email'] = $_POST['email'] ;
        $email=$_POST['email'] ;
        $_SESSION['f_name']= $_POST['first_name'] ;
        $_SESSION['l_name']= $_POST['last_name'] ;
        $_SESSION['birth']= $_POST['birth'] ;
        $link = mysqli_connect("localhost","root","","bdd_sae") ;
        $verif_compte = "SELECT email FROM users WHERE email = '$email'";
        $exist_mail = mysqli_query($link, $verif_compte) ;    
        require_once 'fonction.php';
        session_start();

        if(mysqli_num_rows($exist_mail) >=1)
        {
                $_SESSION["message_mail"] = "Un Email est déjà enregister";
                mysqli_close($link);
        }
        else
        {
            mysqli_close($link);}








    if (!filter_var($_SESSION['$email'], FILTER_VALIDATE_EMAIL))
    {
            $_SESSION["message"] = "Votre email est incorrect";

    
    }
    else
    {
        $_SESSION["message"] = NULL;

    }





    

  
 if(car_interdit($_SESSION['l_name']))

    {
        $_SESSION["message_l_name"] = "Caractères spéciaux interdisent";

    }     
    else
    {
        $_SESSION["message_l_name"] = NULL;

    }

    
    
    
    
    if(car_interdit($_SESSION['f_name']))

    {
        header("Location: inscription.php");
        session_start();
        mysqli_close($link);
        $_SESSION["message_f_name"] = "Caractères spéciaux interdisent";
        exit();

    }    

    elseif (!strtotime($_POST['birth']) == TRUE)
    {
        header("Location: inscription.php");
        session_start();
        mysqli_close($link);
        $_SESSION["message"] = "Votre date de naissance posséde une erreur";
        exit();   
    }

    elseif (!mdp($_POST['password']))
    {
        header("Location: inscription.php");
        session_start();
        mysqli_close($link);
        $_SESSION["message"] = "Votre mdp est invalide";
        exit();
    }

    else

    {
        $first_name = ucfirst(strtolower($_POST['first_name'])) ;
        $last_name = ucfirst(strtolower($_POST['last_name'])) ;
        $birth = $_POST['birth'] ;
        $email = $_POST['email'] ;
        $password = hash("sha256",$_POST['password'], false) ;
        $query = "INSERT INTO users (first_name, last_name, birth, email, password) VALUES ('$first_name', '$last_name', '$birth', '$email', '$password') ;" ;    
        mysqli_query($link, $query) ;
        mysqli_close($link);
        session_start();
        $_SESSION["enregistrer"] = "Votre compte a bien était enregister";
        header("Location: index.php");

    }

}
















else
{
    session_start();
    $_SESSION['f_name']= $_POST['first_name'] ;
    $_SESSION['l_name']= $_POST['last_name'] ;
    $_SESSION['birth']= $_POST['birth'] ;
    $_SESSION['email']= $_POST['email'] ;
    $_SESSION["message"] = "Une erreure est survenue lors de l'envoie du formulair, <br> try again";
    header("Location:inscription.php");
}

?>