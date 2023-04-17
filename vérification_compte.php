<?php
if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['birth']) && !empty($_POST['email']) && !empty($_POST['password'])) 

{
        // récup des données pour les mettre dans des session
        session_start();
        $_SESSION['email'] = $_POST['email'] ;
        $email=$_POST['email'] ;
        $_SESSION['f_name']= $_POST['first_name'] ;
        $_SESSION['l_name']= $_POST['last_name'] ;
        $_SESSION['birth']= $_POST['birth'] ;

        //connexions à la base de donnée 
        require "connection_sql.php";

        //Utilise un select pour le premier if (mail)
        $verif_compte = "SELECT email FROM users WHERE email = '$email'";
        $exist_mail = mysqli_query($link, $verif_compte) ;    
        
        //récupération des fonction (obligatoire)
        require_once 'fonction.php';

        
       



        // Vérification de mail pour éviter les doublons
        if(mysqli_num_rows($exist_mail) >=1)
        {
                $_SESSION["message_mail"] = "Un Email est déjà enregister";
                mysqli_close($link);
        }
        else
        {
            mysqli_close($link);
            $_SESSION["message_mail"] = NULL;
        
        }



        // Vérification si une personne reussie a rentrer autre chose que un mail
        if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
        {
                $_SESSION["message_inc"] = "Votre email est incorrect";

        
        }
        else
        {
            $_SESSION["message_inc"] = NULL;

        }





    

        //Vérification des caractéres spéciaux dans le nom 
        if(car_interdit($_SESSION['l_name']))

            {
                $_SESSION["message_l_name"] = "Caractères spéciaux interdisent";

            }     
            else
            {
                $_SESSION["message_l_name"] = NULL;

            }

    
    
    
        //Vérification des caractéres spéciaux dans le prénom
        if(car_interdit($_SESSION['f_name']))

            {
                $_SESSION["message_f_name"] = "Caractères spéciaux interdisent";

            }     
        else
            {
                $_SESSION["message_f_name"] = NULL;

            }
   



        // vérification de la date de naissance
        if (!strtotime($_POST['birth']) == TRUE)
            {
                $_SESSION["message_birth"] = "Date de naissance invalide";

            }
        else
            {
                $_SESSION["message_birth"] = NULL;

            }



         // vérification du mot de passe
        if (!mdp($_POST['password']))
        {
            $_SESSION["mdp_error"] = "Votre passe doit contenir au minimun 1 caractères spéciaux, 1 chiffre et doit faire minimum 6 caractéres";
        }
        else{

            $_SESSION["mdp_error"] = NULL;

        }



        if (isset( $_SESSION["message_mail"]) || isset( $_SESSION["message_inc"]) || isset( $_SESSION["message_l_name"]) ||isset( $_SESSION["message_f_name"]) || isset( $_SESSION["message_birth"]) || isset( $_SESSION["mdp_error"]) )
   
        {
            header("Location: inscription.php");
            exit();
        }
   
        else

    {
        $first_name = ucfirst(strtolower($_POST['first_name'])) ;
        $last_name = ucfirst(strtolower($_POST['last_name'])) ;
        $birth = $_POST['birth'] ;
        $email = $_POST['email'] ;
        $password = hash("sha256",$_POST['password'], false) ;
        require "connection_sql.php";
        $query = "INSERT INTO users (first_name, last_name, birth, email, password) VALUES ('$first_name', '$last_name', '$birth', '$email', '$password')" ;    
        mysqli_query($link, $query) ;
        mysqli_close($link);
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