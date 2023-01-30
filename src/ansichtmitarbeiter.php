<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 3){
        header("Location: index.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
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
    <h1>Mitarbeiter</h1>

    <?php
        require_once "db_connection.php";
        $user = $_SESSION['userid'];

        //$query = "SELECT * FROM Mitarbeiter WHERE MNR = '$loginID'";
        $query = $con->prepare(
        "SELECT * 
        FROM Auftraege
        LEFT JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        LEFT JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR
        WHERE Auftraege.Mitarbeiter = $user");

        $query->execute();

        echo "<table>";
        echo "<tr><th>AufNr</th><th>Datum</th><th>Zeit</th><th>Kunde</th><th>Mitarbeiter</th><th>Arbeit</th><th>Beschreibung</th></tr>";
        while($row = $query->fetchObject()){
            echo "<tr>";
            echo "<td>" . $row->AuftragsNr . "</td>";
            echo "<td>" . $row->Datum . "</td>";
            echo "<td>" . $row->Zeit . "</td>";
            echo "<td>" . $row->Kunden_Vorname . " " . $row->Kunden_Name . "</td>";
            echo "<td>" . $row->Mitarbeiter_Vorname . " " . $row->Mitarbeiter_Name . "</td>";
            echo "<td>" . $row->Arbeit . "</td>";
            echo "<td>" . $row->Beschreibung . "</td>";
            echo "</tr>";
            
        }
        echo "</table>";

        
    ?>
    
</body>
</html>