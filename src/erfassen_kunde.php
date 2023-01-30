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
    <title>Neuer Kunde</title>
</head>
<body>
    <h1>Kunde erfassen</h1>
    <form action="registrieren_kunde.php" method="POST">
        <table>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" id="name" name="kname" maxlength="25" required></td>
            </tr>
            <tr>
                <td><label for="vorname">Vorname</label></td>
                <td><input type="text" id="vorname" name="kvorname" maxlength="25" required></td>
            </tr>
            <tr>
                <td><label for="geschlecht">Geschlecht</label></td>
                <td>
                    <select name="kgeschlecht" id="geschlecht">
                        <option value="Herr">Herr</option>
                        <option value="Frau">Frau</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="tele">Telefon</label></td>
                <td><input type="text" id="tele" name="ktelefon" maxlength="15" required></td>
            </tr>
            <tr>
                <td><label for="natel">Natel</label></td>
                <td><input type="text" id="natel" name="knatel" maxlength="15" required></td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse</label></td>
                <td><input type="text" id="adresse" name="kadresse" maxlength="50" required></td>
            </tr>
            <tr>
                <td><label for="plz">PLZ</label></td>
                <td><input type="number" id="plz" name="kplz" maxlength="4" required></td>
            </tr>
            <tr>
                <td><label for="ort">Ort</label></td>
                <td><input type="text" id="ort" name="kort" maxlength="25" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="sub" value="erfassen"></td>
                <td><input type="submit" name="sub" value="abbrechen"></td>
            </tr>
        </table>
    </form>
</body>
</html>