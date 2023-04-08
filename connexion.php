<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    
        <h2>Connexion :</h2>
        <form action='connexion.php' method='post'>
        <br> 
        Email : 
        <br> 
        <input type='email' name='email' <?php if(isset($_POST['email'])) { echo "value = '" .$_POST['email']."'"; } ?>>
        <br>  
        Mots de passe : 
        <br> 
        <input type='password' name='password'>
        <input type='submit'>
        </form>
    </div>
    <?php
session_start();

if (isset( $_SESSION["enregistrer"])){
    echo  $_SESSION["enregistrer"];
    session_destroy(); 
}




        $link = mysqli_connect("localhost","root","","bdd_sae") ;
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'] ;
            $_SESSION['email'] = $_POST['email'] ;
            $password = hash("sha256",$_POST['password'], false) ;
            $query = "SELECT first_name, last_name FROM users WHERE email='$email' AND password='$password' ;" ;
            $result = mysqli_query($link, $query) ;
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['first_name'] ;
                echo "<br>" ;
                echo $row['last_name'] ;
            }
        }
    
        mysqli_close($link);
    ?>
</body>
</html>