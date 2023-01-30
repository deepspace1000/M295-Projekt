<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1){
        header("Location: index.php");
        die;
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neuer Mitarbeiter erfassen</title>
</head>
<body>
    <h1>Neuen Mitarbeiter erfassen</h1>

    <form action="registrieren_mitarbeiter.php" method="POST">
        <table>
            <tr>
                <td>
                    <label for="vorname">Vorname: </label>
                </td>
                <td>
                    <input type="text" id="vorname" name="vorname" maxlength="25" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Nachname: </label>
                </td>
                <td>
                    <input type="text" id="name" name="name" maxlength="25" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Passwort: </label>
                </td>
                <td>
                    <input type="password" id="password" name="password" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="radio" id="admin" name="abt" value="1" required>
                    <label for="admin">Admin</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="radio" id="bereichsleiter" name="abt" value="2" >
                    <label for="bereichsleiter">Bereichsleiter</label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="radio" id="mitarbeiter" name="abt" value="3" >
                    <label for="mitarbeiter">Mitarbeiter</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="sub" value="erfassen">
                </td>
                <td>
                    <input type="submit" name="sub" value="abbrechen">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>