<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="POST">
        <p>User ID</p>
        <input type="text" name="loginID"><br>
        <p>Password</p>
        <input type="password" name="loginPassword"><br>
        <input type="submit" name="sub" value="Anmelden">
    </form>
    
    <?php
        require_once "db_connection.php";
    ?>
    
</body>
</html>