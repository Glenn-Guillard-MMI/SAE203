<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/inscription.css">

    <title>Inscription</title>
</head>
<body>
    <nav>
        <img id="logo_univ" src="ressource/logo_univ.png" alt="logo_université">
    </nav>
    <div>
        <form id="formulaire" action='vérification_compte.php' method='post'>
            <div id="div_nom_prenom">
                <p for="nom" class="text_form">Nom : </p>
                <input class="champ" type="text" name="last_name"<?php session_start();     
                if(isset( $_SESSION['f_name'])) {echo htmlentities("value = " . $_SESSION['f_name']);
                } ?> >
                <br>
                <br>
                <p for="prenom" class="text_form">Prénom : </p>

                <input class="champ" type="text" name="first_name" 
                <?php         
                if(isset( $_SESSION['l_name'])) { echo htmlentities("value = " . $_SESSION['l_name']);}
                ?>>


                <br>
                <br>
            </div>
            <div id="div_date_mail">
                <p for="date" class="text_form">Date de naissance : </p>
                <input class="champ" type="date" name="birth" <?php 
        if(isset( $_SESSION['birth'])) {echo htmlentities("value = " . $_SESSION['birth']);}
        ?>>
                <br>
                <br>


                <p for="mail" class="text_form">E-mail : </p>
                <input class="champ" type="email" name="email" <?php       
         if(isset( $_SESSION['email'])) {
            echo htmlentities("value = " . $_SESSION['email']);}    
        ?> >


                <br>
                <br>
            </div>
            <div id="div_mdp">
                <p for="password" class="text_form">Mot de passe : </p>
                <input class="champ" type="password" name="password" >
                <br>
                <br>
            </div>
            <div>
                <button type="submit" id="button">S'inscrire</button>
            </div>
        </form>
    </div>
    <div id="connexion_compte">
        <a id="connexion_compte_text" href="index.php">Se connecter</a>
    </div>

<?php
if (isset( $_SESSION["message"])){
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<p>". $_SESSION["message"] ."</p>";
}

?>

</body>
</html>