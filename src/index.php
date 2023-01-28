<?php session_start();
    //If user is still loged in inpmlement
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
</head>
<body>
    <h1>Login</h1>

    <form action="login.php" method="POST">
        <p>User ID</p>
        <input type="text" name="loginID"><br>
        <p>Password</p>
        <input type="password" name="loginPassword"><br>
        <input type="submit" name="sub" value="Anmelden">
    </form>
    <?php
        if(isset($_SESSION['meldungen'])){
            echo "<p>" . $_SESSION['meldungen'] . "</p>";
        }
    ?>
    
</body>
</html>