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
        LEFT JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        LEFT JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR
        WHERE Auftraege.Freigegeben_Verrechnung = 0");

        $query->execute();
        
        echo "<table>";
        echo "<tr><th>AufNr</th><th>Terminwunsch</th><th>Datum</th><th>Zeit</th><th>Kunde</th><th>Mitarbeiter</th><th>Arbeit</th><th>Beschreibung</th><th>Ausgefuehrt</th></tr>";
        while($row = $query->fetchObject()){
            echo "<form action='bereichsleiter_formaus.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $row->AuftragsNr . "</td>";
            echo "<td>" . $row->Terminwunsch . "</td>";
            if(isset($row->Datum)){
                echo "<td>" . $row->Datum . "</td>";
            }else {
                echo "<td>" . "<input type='date' name='date' maxlength='25' required>" . "</td>";
            }
            if(isset($row->Zeit)){
                echo "<td>" . $row->Zeit . "</td>";
            }else{
                echo "<td>" . "<input type='number'name='time' maxlength='25' step='00.01'  required>" . "</td>";
            }
            echo "<td>" . $row->Kunden_Vorname . " " . $row->Kunden_Name . "</td>";
            if(isset($row->Mitarbeiter)){
                echo "<td>" . $row->Mitarbeiter_Vorname . " " . $row->Mitarbeiter_Name . "</td>";
            }else{
                $abfrage = $con->prepare("SELECT * FROM Mitarbeiter WHERE Abteilung = '3'");
                $abfrage->execute();
                echo "<td>";
                echo "<select name='mitarbeiter'>";
                while($mitarbeiterrow = $abfrage->fetchObject()){
                    echo "<option value='$mitarbeiterrow->MNR'>" . $mitarbeiterrow->Mitarbeiter_Vorname . " " . $mitarbeiterrow->Mitarbeiter_Name . "</option>";
                }
                echo "</select>";
                echo "</td>";
            }
            echo "<td>" . $row->Arbeit . "</td>";
            echo "<td>" . $row->Beschreibung . "</td>";
            if($row->Ausgefuehrt == 0){
                echo "<td> <input type='checkbox' disabled='disabled'></td>";
            } else {
                echo "<td> <input type='checkbox' disabled='disabled' checked='checked'></td>";
                echo "<td>" . "<input type='submit' name='sub' value='freigeben'>" . "</td>";
            }
        
            if(!isset($row->Mitarbeiter)){
                echo "<td>" . "<input type='submit' name='sub' value='disponieren'>" . "</td>";
            }
            echo "<td>" . "<input type='submit' name='sub' value='pdf'>" . "</td>";
            echo "<td>" . "<input type='hidden' name='auftrag' value='$row->AuftragsNr'>" . "</td>";
            echo "</tr>";
            echo "</form>";
        }
        echo "</table>";
       

        
    ?>
    
</body>
</html>