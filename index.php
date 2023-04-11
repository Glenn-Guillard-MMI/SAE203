<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

<nav>
        <img id="logo_univ" src="ressource/logo_univ.png" alt="logo_université">
    </nav>
    <div id="div_form">
        <form id="formulaire" action='login.php' method='post'>
            <p for="id" class="text_form">Identifiant : </p>
            <input class="champ" type="text" name="email" <?php if(isset($_POST['email'])) { echo "value = '" .$_POST['email']."'"; } ?>>
            <br>
            <br>
            <p for="password" class="text_form">Mot de passe : </p>
            <input class="champ" type="password" name="password">
            <br>
            <br>
            <button type="submit" id="boutton_connecter">Se connecter</button>
        </form>
    </div>
    <div id="creation_compte">
        <a id="creation_compte_text" href="inscription.php">Créer un compte</a>
    </div>
</body>
</html>