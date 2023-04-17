<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueik</title>
</head>
<body>
    <form action='materiel_dispo.php'>
    <button type='submit'>materiel dispo</button>
    </form>
    <?php
        session_start();

        $link = mysqli_connect("localhost","root","","bdd_sae") ;

        $email = $_SESSION['email'];
        
        $query = "SELECT admin FROM users WHERE email='$email' ;" ;
        $result = mysqli_query($link, $query) ;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['admin'] == '1') {
                echo "<form action='new_materiel.php'>" ;
                    echo "<button type='submit'>page admin</button>" ;
                echo "</form>";
            }
        }
                mysqli_close($link);
    ?>
</body>
</html>