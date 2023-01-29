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
    <title>Document</title>
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <h1>admin</h1>

    <?php
        require_once "db_connection.php";

        //$query = "SELECT * FROM Mitarbeiter WHERE MNR = '$loginID'";
        $query = 
        "SELECT * 
        FROM Auftraege
        JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR";

        $ergebnis = $con->query($query);

        echo "<table>";
        echo "<tr><th>AufNr</th><th>Datum</th><th>Zeit</th><th>Kunde</th><th>MitName</th><th>Beschreibung</th></tr>";
        while($row = $ergebnis->fetchObject()){
            echo "<tr>";
            echo "<td>" . $row->AuftragsNr . "</td>";
            echo "<td>" . $row->Datum . "</td>";
            echo "<td>" . $row->Zeit . "</td>";
            echo "<td>" . $row->Kunde . "</td>";
            echo "<td>" . $row->Mitarbeiter_Name . "</td>";
            echo "<td>" . $row->Beschreibung . "</td>";
            echo "</tr>";
            
        }
        echo "</table>";

        
    ?>
    
</body>
</html>