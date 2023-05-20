<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/new_materiel.css">
    <title>Ajouter du matériel</title>
</head>

<body>

<?php
    require "header.php";
    ?>



    <form action='mdf_admi.php' method='post'>
        <div id="div_formulaire">
            <div id="titre">
                <p>Information sur le matériel : <?php 
             if (isset($_SESSION["acpt_valid"])) 
             {
            echo "<span id='acpt'>" . $_SESSION["acpt_valid"] . "</span>";
            unset( $_SESSION["acpt_valid"] );
            }
            ?>
            </p>
            </div>
            <div id="container">
                <div id="div_info">
                    <p>Nom : </p>
                    <input class="champs_info" type="text" name="nom" 
                    <?php 
                    if (isset($_SESSION['nom_mdf'])) {
                        echo "value = '" . htmlentities($_SESSION['nom_mdf']) . "'";
                    }
                    ?>>

                    <?php 
                    if (isset($_SESSION["msg_nom_mat"])) {

                        echo "<p class='erreur'>" . $_SESSION["msg_nom_mat"] . "</p>";

                    } 
                    ?>
                    <br>

                    <br>



                    <p>Type : </p>
                    <select class="champs_info" name="type">
                        <?php
                        $liste = ["Caméra", "Micro", "Light"];
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
                    if (isset($_SESSION["msg_type_mat"])) {

                        echo "<p class='erreur'>" . $_SESSION["msg_type_mat"] . "</p>";
                    }
                    ?>


                    <br>
                   
                    <br>
                    <p>Référence : </p>
                    <input class="champs_info" type="text" <?php
                    if (isset($_SESSION['ref_mdf'])) {
                        echo "value = '" . htmlentities($_SESSION['ref_mdf']) . "'"."readonly='readonly'";
                    }
                    ?>>
                <?php
                if (isset($_SESSION["msg_reference_mat"])) {

                    echo "<p class='erreur'>" . $_SESSION["msg_reference_mat"] . "</p>";
                }
                ?>
                <br>

                <br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <span>Image :</span>
                <input class="champs_info" id="input_img" type="file" name="image" name=image_mat <?php
                    if (isset($_SESSION['img_mat'])) {
                        echo "value = '" . htmlentities($_SESSION['img_mat']) . "'";
                        echo $_SESSION['img_mat'];
                    }
                    ?>>
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
            <br>
            <br>
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