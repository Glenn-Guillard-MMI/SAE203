<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="styles/acceuil.css">
    <title>Acceuil</title>
</head>

<body>
    <header>
        <div id="nav">
            <div>
                <a href="acceuil.php"><img id="logo_univ" src="ressource/logo_univ.png" alt="logo université"></a>
            </div>
            <div class="menu" id="menu_materiel">
                <a class="bouton_menu" href="materiel.html">Matériel</a>
            </div>
            <div class="menu">
                <a class="bouton_menu" href="demande.html">Mes demandes</a>
            </div>
            <?php
                session_start();

                require "connection_sql.php";

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
    <div id="bouton_all_mater">
        <a href="materiel.html" id="bouton_voir_mater">Voir tout le matériel > </a>
    </div>
    <div id="section_other_service">
        <div>
            <p id="text_service">Lien vers d'autres services : </p>
        </div>
        <div class="container_service">
            <div id="container_service_elearning">
                <div>
                    <img src="ressource/entrainement.png" alt="éudier" class="img_service">
                </div>
                <div class="centrer_text">
                    <a href="https://elearning.univ-eiffel.fr/" class="lien_service" target="_blank">Elearning</a>
                </div>
            </div>
            <div id="container_service_ade">
                <div>
                    <img src="ressource/programme.png" alt="calendrier" class="img_service">
                </div>
                <div class="centrer_text">
                    <a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt" class="lien_service" target="_blank">ADE</a>
                </div>
            </div>
            <div id="container_service_biblio">
                <div>
                    <img src="ressource/pile-de-livres.png" alt="pile de livre" class="img_service">
                </div>
                <div class="centrer_text">
                    <a href="https://zbum.ent.sirsidynix.net.uk/client/fr_FR/default" class="lien_service" target="_blank">Bibliothèque</a>
                </div>
            </div>
        </div>
    </div>
        <?php 
    require "footer.html"
    ?>

</body>

</html>