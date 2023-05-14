<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/connexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>


    <header>
        <div id="nav">
            <img id="logo_univ" src="ressource/logo_univ.png" alt="logo_université">
        </div>
    </header>



    <div id="titre_connexion">
        <h1>Connexion</h1>
        <!-- Message erreur -->
        <?php
        session_start();
        if (isset($_SESSION["erg_cmp_valide"])) {
            echo "<p id='enregistre'>" . $_SESSION["erg_cmp_valide"] . "</p>";
            unset($_SESSION["erg_cmp_valide"]);
        }
        if (isset($_SESSION["pb_co"])) {
            echo "<p id='problem'>" . $_SESSION["pb_co"] . "</p>";
            unset($_SESSION["pb_co"]);
        }
        if (isset($_SESSION["Token"]) && $_SESSION["Token"] === "Oui") {
            header("LOCATION: acceuil.php");
        }
        ?>
    </div>

    <div class="container">
        <form id="formulaire" action='login.php' method='post'>
            <div id="div_form">




                <!-- Champ e-mail -->
                <p for="id" class="text_form">E-mail : </p>
                <input class="champ" type="text" name="email" <?php
                if (isset($_SESSION['email'])) {
                    echo "value = '" . htmlentities($_SESSION['email']) . "'";
                } ?>>







                <br>




                <!-- Champ MDP -->
                <p for="password" class="text_form">Mot de passe : </p>
                <input class="champ" type="password" name="password">
                <br>

            </div>




            <div id="bouttons">

                <div id="boutton_connecter_placement">
                    <button type="submit" id="boutton_connecter">Se connecter</button>
                </div>

        </form>



        <form action="inscription.php">
            <button type="submit" id="button_inscription">Page inscription</button>
        </form>

    </div>

    </div>


</body>

</html>