<?php session_start();?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
</head>
<body>
    
    <?php
        require_once "db_connection.php";

        $loginID = $_POST['loginID'];
        $loginpw = $_POST['loginPassword'];
    

        $query = "SELECT * FROM Mitarbeiter WHERE MNR = '$loginID'";
        $ergebnis = $con->query($query);
        $row = $ergebnis->fetchObject();
    
        if ($ergebnis->rowCount() == 1){
            if (password_verify($loginpw, $row->Passwort)){
                $_SESSION['userid'] = $loginID;
                $_SESSION['abteilung'] = $row->Abteilung;
                unset($_SESSION['meldungen']);
                header("Location: auftragsansicht.php"); 
            } 
            else {
                $_SESSION['meldungen'] = "Falsches Passwort";
                header("Location: index.php");
            }
        } 
        else {
            $_SESSION['meldungen'] = "Dieser User existiert nicht";
            header("Location: index.php");
        }
    
    ?>
    
</body>
</html>