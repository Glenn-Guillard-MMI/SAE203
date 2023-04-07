<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>sae</title>
</head>
<body>
    <div>
        <h2>Nouveau compte :</h2>
        <form action='sae.php' method='post'>
        PrÃ©nom : 
        <br> 
        <input type='text' name='first_name'>
        <br>  
        Nom : 
        <br> 
        <input type='text' name='last_name'>
        <br>  
        Date de naissance : 
        <br> 
        <input type='date' name='birth'>
        <br>  
        Email : 
        <br> 
        <input type='email' name='email'>
        <br>  
        Mots de passe : 
        <br> 
        <input type='password' name='password'>
        <input type='submit'>
        </form>
    </div>
<?php
    $link = mysqli_connect("localhost","root","","bdd_sae") ;

    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['birth']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $first_name = $_POST['first_name'] ;
        $last_name = $_POST['last_name'] ;
        $birth = $_POST['birth'] ;
        $email = $_POST['email'] ;
        $password = hash("sha256",$_POST['password'], false) ;
     
        $query = "INSERT INTO users (first_name, last_name, birth, email, password) VALUES ('$first_name', '$last_name', '$birth', '$email', '$password') ;" ;    
        mysqli_query($link, $query) ;
    }

    mysqli_close($link);
?>
</body>
</html>