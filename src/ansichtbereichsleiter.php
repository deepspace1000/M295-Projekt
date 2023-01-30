<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 2){
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
    <h1>bereichsleiter</h1>


    <?php
        require_once "db_connection.php";

        //$query = "SELECT * FROM Mitarbeiter WHERE MNR = '$loginID'";
        $query = $con->prepare(
        "SELECT * 
        FROM Auftraege
        JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR");

        $query->execute();
        echo "<form acion='' method='POST'>";
            echo "<table>";
            echo "<tr><th>AufNr</th><th>Datum</th><th>Zeit</th><th>Kunde</th><th>Mitarbeiter</th><th>Arbeit</th><th>Beschreibung</th></tr>";
            while($row = $query->fetchObject()){
                
                echo "<tr>";
                echo "<td>" . $row->AuftragsNr . "</td>";
                echo "<td>" . $row->Datum . "</td>";
                echo "<td>" . $row->Zeit . "</td>";
                echo "<td>" . $row->Kunden_Vorname . " " . $row->Kunden_Name . "</td>";
                if(isset($row->Mitarbeiter)){
                    echo "<td>" . $row->Mitarbeiter_Vorname . " " . $row->Mitarbeiter_Name . "</td>";
                }
                echo "<td>" . $row->Arbeit . "</td>";
                echo "<td>" . $row->Beschreibung . "</td>";
                echo "</tr>";
                
            }
            echo "</table>";
        echo "</form>";

        
    ?>
    
</body>
</html>