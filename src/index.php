<?php session_start();
    if(isset($_SESSION['userid'])){
        header("Location: auftragsansicht.php");
        die;
    }
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
        <table>
            <tr>
                <td>
                    <label for="id">UserID: </label>
                </td>
                <td>
                    <input type="text" id="id" name="loginID">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Passwort: </label>
                </td>
                <td>
                    <input type="password" id="password" name="loginPassword"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="sub" value="Anmelden">
                </td>
            </tr>
        </table>
    </form>
    
    <?php
        if(isset($_SESSION['meldungen'])){
            echo "<p>" . $_SESSION['meldungen'] . "</p>";
        }
    ?>
    
</body>
</html>