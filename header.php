<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="styles/header.css" />
</head>

<body>
  <header>
    <div id="nav">
      <div>
        <a href="acceuil.php"><img id="logo_univ" src="ressource/logo_univ.png" alt="logo université" /></a>
      </div>
      <div class="menu" id="menu_materiel">
        <a class="bouton_menu" href="materiel_dispo.php">Matériel</a>
      </div>
      <div class="menu">
        <a class="bouton_menu" href="demande.php">Mes demandes</a>
      </div>
      <?php
      session_start();

      require "connection_sql.php";

      $email = $_SESSION['email'];
      if (!isset($_SESSION["email"])) {
        header("LOCATION:index.php");
      }


      $query = "SELECT admin FROM users WHERE email='$email' ;";
      $result = mysqli_query($link, $query);
      while ($row = mysqli_fetch_assoc($result)) {
        $admin = $row['admin'];
        if ($admin == '1') {
          echo "<div class='menu'>";
          echo "<a class='bouton_menu' href='validation.php'>Validation</a>";
          echo "</div>";
          echo "<div class='menu'>";
          echo "<a class='bouton_menu' href='new_materiel.php'>Ajout de Matériel</a>";
          echo "</div>";
        }
      }
      mysqli_close($link);
      ?>
      <div id="menu_logo">
        <img <?php
              if ($admin == '1') {
                echo "id='logo_compte_admin'";
              } else {
                echo "id='logo_compte_eleve'";
              }
              ?> src="ressource/logo_compte.png" alt="logo compte" />
        <a id="modif_text_deco" href="déconnexion.php">
          <div <?php
              if ($admin == '1') {
                echo "id='deconnexion_admin'";
              } else {
                echo "id='deconnexion_eleve'";
              }
              ?>>
            <span id="deconnexion_bouton">Déconnexion</span>
          </div>
        </a>
      </div>
    </div>
  </header>
  <div id="bandeau_img">
    <img id="interieur" src="ressource/etudiant.jpg" alt="intérieur" />
  </div>
</body>