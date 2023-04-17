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
        <div id="nav">
            <img id="logo_univ" src="ressource/logo_univ.png" alt="logo université">
        </div>
    </header>
    <div id="bandeau_img">
        <img id="interieur" src="ressource/etudiant.jpg" alt="intérieur">
    </div>
    <form action='new_materiel.php' method='post'>
        <div id="div_formulaire">
            <div id="titre">
                <p>Information sur le matériel : </p>
            </div>
            <div id="container">
                <div id="div_info">
                    <p>Nom : </p>
                    <input class="champs_info" type="text" name="nom" required="required">
                    <br>
                    <br>
                    <p>Type : </p>
                    <select class="champs_info" name="type" required="required">
                        <option value="">-- Type de matériel --</option>
                        <option value="camera">Caméra</option>
                        <option value="micro">micro</option>
                        <option value="light">light</option>
                    </select>
                    <br>
                    <br>
                    <p>Référence : </p>
                    <input class="champs_info" type="text" name="reference" required="required">
                </div>
                <div id="description">
                    <p>Description : </p>
                    <textarea id="champs" type="text" name="description" size="10" required="required"></textarea>
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
        session_start();

        $link = mysqli_connect("localhost","root","","bdd_sae") ;
    
        $email = $_SESSION['email'];
        
        $query = "SELECT admin FROM users WHERE email='$email' ;" ;
        $result = mysqli_query($link, $query) ;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['admin'] == '1') {
                if (!empty($_POST['nom']) && !empty($_POST['reference']) && !empty($_POST['type']) && !empty($_POST['description'])) {
                    $nom = $_POST['nom'] ;
                    $reference = $_POST['reference'] ;
                    $type = $_POST['type'] ;
                    $description = $_POST['description'] ;
                    $query = "INSERT INTO materiel (reference, nom, type, description) VALUES ('$reference', '$nom', '$type', '$description') ;" ;    
                    mysqli_query($link, $query) ;
                }
            }
            else{
                header("Location: accueil.php");
            }
        }

        mysqli_close($link);
    ?>
</body>
</html>