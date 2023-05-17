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
        if ($row['admin'] == '1') {
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
        <img id="logo_compte" src="ressource/logo_compte.png" alt="logo compte" />
        <div id="deconnexion">
          <span>Déconnexion</span>
        </div>
      </div>
    </div>
  </header>
  <div id="bandeau_img">
    <img id="interieur" src="ressource/etudiant.jpg" alt="intérieur" />
  </div>
</body>

</html>