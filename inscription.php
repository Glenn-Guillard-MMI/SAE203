<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/inscription.css">

    <title>Inscription</title>
</head>

<body>
    <header>
        <div id="nav">
            <img id="logo_univ" src="ressource/logo_univ.png" alt="logo_université">
        </div>
    </header>



    <div id="titre_inscription">
        <h1>Inscription</h1>
    </div>



    <div class="conatainer">


        <form id="formulaire" action='vérification_compte.php' method='post'>

            <div id="div_form">

                <div id="div_nom_prenom">


                    <!--Champs nom-->
                    <p for="nom" class="text_form">Nom : </p>
                    <input class="champ" type="text" name="first_name" required="required" <?php
                    session_start();
                    if (isset($_SESSION['f_name'])) {
                        echo htmlentities("value = " . $_SESSION['f_name']);
                    }
                    ?>>
                    <br>
                    <?php
                    if (isset($_SESSION["message_f_name"])) {
                        echo "<P class='erreur'>" . $_SESSION["message_f_name"] . "</p>";
                    }
                    ?>
                    <br>



                    <!--Champs prenom-->
                    <p for="prenom" class="text_form">Prénom : </p>
                    <input class="champ" type="text" name="last_name" required="required" <?php
                    if (isset($_SESSION['l_name'])) {
                        echo htmlentities("value = " . $_SESSION['l_name']);
                    }
                    ?>>
                    <br>
                    <?php if (isset($_SESSION["message_l_name"])) {
                        echo "<P class='erreur'>" . $_SESSION["message_l_name"] . "</p>";
                    }
                    ?>
                    <br>
                </div>


                <div id="div_date_mail">

                    <!--Champs date de naissance-->
                    <p for="date" class="text_form">Date de naissance : </p>
                    <input class="champ" type="date" name="birth" required="required" <?php
                    if (isset($_SESSION['birth'])) {
                        echo htmlentities("value = " . $_SESSION['birth']);
                    }
                    ?>>
                    <br>
                    <?php if (isset($_SESSION["message_birth"])) {
                        echo "<P class='erreur'>" . $_SESSION["message_birth"] . "</p>";
                    }
                    ?>
                    <br>




                    <!--Champs E-mail-->
                    <p for="mail" class="text_form">E-mail : </p>
                    <input class="champ" type="email" name="email" required="required" <?php
                    if (isset($_SESSION['email'])) {
                        echo htmlentities("value = " . $_SESSION['email']);
                    }
                    ?>>
                    <br>
                    <?php if (isset($_SESSION["message_inc"])) {
                        echo "<P class='erreur'>" . $_SESSION["message_inc"] . "</p>";
                    }
                    ?>
                    <?php if (isset($_SESSION["message_mail"])) {
                        echo "<P class='erreur'>" . $_SESSION["message_mail"] . "</p>";
                    }
                    ?>
                    <br>




                </div>



                <div id="div_mdp">

                    <!--Champs Mot de passe-->
                    <p for="password" class="text_form">Mot de passe : </p>
                    <input class="champ" type="password" name="password" required="required">
                    <br>
                    <?php if (isset($_SESSION["mdp_error"])) {
                        echo "<P class='erreur'>" . $_SESSION["mdp_error"] . "</p>";
                    }
                    ?>
                    <br>
                </div>

            </div>


            <div id="bouttons">

                <div>
                    <button type="submit" id="button">S'inscrire</button>
                </div>

        </form>
        <form action="index.php">
            <button type="submit" id="button_connexion">Page connexion </button>
        </form>

    </div>
    </div>

</body>

</html>