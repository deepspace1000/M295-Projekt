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
    <form>
        <table>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" id="name" name="kname" maxlength="25"></td>
            </tr>
            <tr>
                <td><label for="vorname">Name</label></td>
                <td><input type="text" id="vorname" name="kvorname" maxlength="25"></td>
            </tr>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" id="name" name="kname" maxlength="25"></td>
            </tr>
        </table>
    </form>
</body>
</html>