<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
    <?php
        $link = mysqli_connect("localhost","root","","bdd_sae") ;
        session_start() ;
        $email = $_SESSION['email'] ;
        $query = "SELECT first_name, last_name FROM users WHERE email='$email' ;" ;
        $result = mysqli_query($link, $query) ;
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['first_name'] ;
            echo "<br>" ;
            echo $row['last_name'] ;
        }
    ?>
    
</body>
</html>