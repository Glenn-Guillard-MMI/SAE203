<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/new_materiel.css">
    <title>Modification du matériel</title>
</head>

<body>

    <?php
    require "header.php";
    ?>



    <form action='mdf_admi.php' method='post'>
        <div id="div_formulaire">
            <div id="titre">
                <p>Information sur le matériel :
                    <?php
                    if (isset($_SESSION["acpt_valid"])) {
                        echo "<span id='acpt'>" . $_SESSION["acpt_valid"] . "</span>";
                        unset($_SESSION["acpt_valid"]);
                    }
                    ?>
                </p>
            </div>
            <div id="container">
                <div id="div_info">
                    <p class="titre_champs">Nom : </p>
                    <input class="champs_info" type="text" name="nom" <?php
                    if (isset($_SESSION['nom_mdf'])) {
                        echo "value = '" . htmlentities($_SESSION['nom_mdf']) . "'";
                    }
                    ?>>

                    <?php
                    if (isset($_SESSION["msg_nom_mdf"])) {

                        echo "<p class='erreur'>" . $_SESSION["msg_nom_mdf"] . "</p>";
                    }
                    ?>




                    <p class="titre_champs">Type : </p>
                    <select class="champs_info" name="type">
                        <?php
                        $liste = [
                            "Caméra",
                            "Micro",
                            "Light",
                            "PC",
                            "Casque",
                            "Trépied",
                            "projecteur"
                        ];
                        foreach ($liste as $i) {
                            echo "<option value='" . $i . "'";
                            if (isset($_SESSION['type_mdf']) && $_SESSION['type_mdf'] == $i) {
                                echo "selected";
                            }
                            echo ">" . $i . "</option>";
                        }
                        ?>

                    </select>
                    <?php
                    if (isset($_SESSION["msg_type_mdf"])) {

                        echo "<p class='erreur'>" . $_SESSION["msg_type_mdf"] . "</p>";
                    }
                    ?>



                    <p class="titre_champs">Référence : </p>
                    <input class="champs_info" type="text" <?php
                    if (isset($_SESSION['ref_mdf'])) {
                        echo "value = '" . htmlentities($_SESSION['ref_mdf']) . "'" . "readonly='readonly'";
                    }
                    ?>>
                    <?php
                    if (isset($_SESSION["msg_reference_mdf"])) {

                        echo "<p class='erreur'>" . $_SESSION["msg_reference_mdf"] . "</p>";
                    }
                    ?>


                </div>

                <div id="description">
                    <p>Description : </p>
                    <textarea id="champs" type="text" name="description" size="10"><?php
                    if (isset($_SESSION['description_mdf'])) {
                        echo htmlentities($_SESSION['description_mdf']);
                    }
                    ?></textarea>
                </div>
            </div>

            <div id="div_boutton">
                <button type="submit" id="boutton_ajout">modifier</button>
            </div>
        </div>
    </form>
    </div>
    <?php
    require "footer.html"
        ?>
</body>

</html>