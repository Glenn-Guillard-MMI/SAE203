<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/new_materiel.css">
    <link rel="icon" href="ressource/fried_corp.png" type="image/icon type">
    <title>Ajouter du matériel</title>
</head>

<body>
    <header>
        <div id="container">

            <!-- logo header -->
            <div>
                <a href="acceuil.php"><img id="logo_univ" src="ressource/logo_univ.png" alt="logo université"></a>
            </div>

            <!-- Menue -->
            <div id="nav">

                <div class="menu">
                    <a class="bouton_menu" href="materiel.html">Matériel</a>
                </div>


                <div class="menu">
                    <a class="bouton_menu" href="demande.html">Mes demandes</a>
                </div>


                <?php
                //Menue admin
                session_start();
                require "connection_sql.php";
                $email = $_SESSION['email'];
                $query = "SELECT admin FROM users WHERE email='$email' ;";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);
                if ($row['admin'] == '1') {
                    echo "<div class='menu'>";
                    echo "<a class='bouton_menu' href='validation.html'>Validation</a>";
                    echo "</div>";
                    echo "<div class='menu'>";
                    echo "<a class='bouton_menu' href='new_materiel.php'>Ajout de Matériel</a>";
                    echo "</div>";
                } else {
                    header("Location: index.php");
                    exit();
                }

                mysqli_close($link);
                ?>
            </div>

            <div id="menu_logo">
                <img id="logo_compte" src="ressource/logo_compte.png" alt="logo compte">
            </div>
        </div>


    </header>

    <!-- Image header -->
    <div id="bandeau_img">
        <img id="interieur" src="ressource/etudiant.jpg" alt="intérieur">
    </div>



    <form action='crea_mat_admin.php' method='post'>
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
                    <input class="champs_info" type="text" name="nom" <?php
                    if (isset($_SESSION['nom_mat'])) {
                        echo "value = '" . htmlentities($_SESSION['nom_mat']) . "'";
                    }
                    ?>>

                    <?php if (isset($_SESSION["msg_nom_mat"])) {

                        echo "<p class='erreur'>" . $_SESSION["msg_nom_mat"] . "</p>";

                    } ?>
                    <br>

                    <br>



                    <p>Type : </p>
                    <select class="champs_info" name="type">
                        <?php
                        $liste = ["Caméra", "Micro", "Light"];
                        foreach ($liste as $i) {
                            echo "<option value='" . $i . "'";
                            if (isset($_SESSION['type_mat']) && $_SESSION['type_mat'] == $i) {
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
                    <input class="champs_info" type="text" name="reference" <?php
                    if (isset($_SESSION['reference_mat'])) {
                        echo "value = '" . htmlentities($_SESSION['reference_mat']) . "'";
                    }
                    ?>>
                <?php
                if (isset($_SESSION["msg_reference_mat"])) {

                    echo "<p class='erreur'>" . $_SESSION["msg_reference_mat"] . "</p>";
                }
                ?>
                </div>

                <div id="description">
                    <p>Description : </p>
                    <textarea id="champs" type="text" name="description" size="10"><?php
                    if (isset($_SESSION['description_mat'])) {
                        echo htmlentities($_SESSION['description_mat']);
                    }
                    ?></textarea>
                </div>
            </div>
            <br>
            <br>
            <div id="div_boutton">
                <button type="submit" id="boutton_ajout">Ajouter nouveau matériel</button>
            </div>
        </div>
    </form>
    </div>
    <?php 
    require "footer.html"
    ?>
</body>

</html>