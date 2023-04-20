<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="styles/acceuil.css">
    <link rel="icon" href="ressource/fried_corp.png" type="image/icon type">
    <title>Acceuil</title>
</head>

<body>
    <header>
        <div id="container">
            <div>
                <img id="logo_univ" src="ressource/logo_univ.png" alt="logo université">
            </div>
            <div id="nav">
                <div class="menu">
                    <a class="bouton_menu" href="materiel.html">Matériel</a>
                </div>
                <div class="menu">
                    <a class="bouton_menu" href="demande.html">Mes demandes</a>
                </div>
                <?php
                session_start();

                $link = mysqli_connect("localhost", "root", "", "bdd_sae");

                $email = $_SESSION['email'];

                $query = "SELECT admin FROM users WHERE email='$email' ;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['admin'] == '1') {
                        echo "<div class='menu'>";
                        echo "<a class='bouton_menu' href='validation.html'>Validation</a>";
                        echo "</div>";
                        echo "<div class='menu'>";
                        echo "<a class='bouton_menu' href='new_materiel.php'>Ajout de Matériel</a>";
                        echo "</div>";
                    }
                }
                mysqli_close($link);
                ?>
            </div>
            <div id="menu_logo">
                    <img id="logo_compte" src="ressource/logo_compte.png" alt="logo compte">
                </div>
        </div>
    </header>
    <div id="bandeau_img">
        <img id="interieur" src="ressource/etudiant.jpg" alt="intérieur">
    </div>
    <div id="div_nouveaute">
        <p id="nouveaute">Les nouveautés</p>
    </div>
    <div id="product_container">
        <div class="div_img">
            <img class="img_product" src="ressource/camera.png" alt="caméra">
        </div>
        <div class="div_img">
            <img class="img_product" src="ressource/trepied.png" alt="trepied">
        </div>
        <div class="div_img">
            <img class="img_product" src="ressource/light.png" alt="light">
        </div>
        <div class="div_img">
            <img id="img_perche" src="ressource/perche.png" alt="perche micro">
        </div>
    </div>



</body>

</html>