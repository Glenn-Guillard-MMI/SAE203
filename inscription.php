<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>sae</title>
</head>
<body>
    <div>
        <h2>Nouveau compte :</h2>
        <form action='vérification_compte.php' method='post'>
        Prénom : 
        <br> 

        <input type='text' name='first_name' <?php 
        session_start();

        if(isset( $_SESSION['f_name'])) { echo "value = '" . $_SESSION['f_name']."'"; } 
        
        ?> >
        <br>  
        Nom : 
        <br> 
        <input type='text' name='last_name'<?php         
        
        if(isset( $_SESSION['l_name'])) { echo "value = '" . $_SESSION['l_name']."'"; }
        
        ?>>
        <br>  

        Date de naissance : 
        <br> 
        <input type='date' name='birth' <?php 
        
        if(isset( $_SESSION['birth'])) { echo "value = '" . $_SESSION['birth']."'"; }
        
        
        ?>>
        
        
        <br>  
        Email : 
        <br> 
        <input type='email' name='email' <?php 
                
        
         if(isset( $_SESSION['email'])) { echo "value = '" . $_SESSION['email']."'"; }
        
        
        
        ?>>
        <br>  
        Mots de passe : 
        <br> 
        <input type='password' name='password'>
        <input type='submit'>
        </form>
        <?php 
        if (isset( $_SESSION["message"])){
            echo  $_SESSION["message"];
        }
        ?>
    </div>

</body>
</html>