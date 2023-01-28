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
                header("Location: create_pw.php"); 
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
        
        

         

        /*

        $sql = "SELECT * FROM Mitarbeiter";
        $ergebnis = $con->query($sql);
        
        echo "<table><tr><th>MNR</th><th>Name</th><th>Vorname</th><th>Abteilung</th><th>Passwort</th></tr>";
        while ($zeile = $ergebnis->fetchObject()){
            echo "<tr>";
            echo "<td>" . $zeile->MNR . "</td>";
            echo "<td>" . $zeile->Mitarbeiter_Name . "</td>";
            echo "<td>" . $zeile->Mitarbeiter_Vorname . "</td>";
            echo "<td>" . $zeile->Abteilung . "</td>";
            echo "<td>" . $zeile->Passwort . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        */
    ?>
    
</body>
</html>