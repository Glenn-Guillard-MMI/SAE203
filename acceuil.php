<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="styles/acceuil.css">

    <title>Acceuil</title>
</head>

<body>
    <?php
    require "header.php";
    ?>
    <div id="div_nouveaute">
        <p id="nouveaute">Les nouveautés</p>
    </div>
    <div id="product_container">

        <?php
        require "connection_sql.php";
        $query = "SELECT * FROM materiel limit 4";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='div_img'>";
            echo "<img class='img_product' src='images/" . $row['reference'] . ".jpg'" . " alt='caméra'>";
            echo "</div>";


        }



        ?>
    </div>
    <div id="bouton_all_mater">
        <a href="materiel_dispo.php" id="bouton_voir_mater">Voir tout le matériel > </a> <!-- changement du lien-->
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
                    <a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt"
                        class="lien_service" target="_blank">ADE</a>
                </div>
            </div>
            <div id="container_service_biblio">
                <div>
                    <img src="ressource/pile-de-livres.png" alt="pile de livre" class="img_service">
                </div>
                <div class="centrer_text">
                    <a href="https://zbum.ent.sirsidynix.net.uk/client/fr_FR/default" class="lien_service"
                        target="_blank">Bibliothèque</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require "footer.html"
        ?>

</body>

</html>