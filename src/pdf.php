<?php session_start();
    if (!isset($_SESSION['userid']) || !isset($_SESSION['auftragsnr'])){
        header("Location: index.php");
        die;
    }

    require_once "db_connection.php";
    $auftragsnr = $_SESSION['auftragsnr'];
    unset($_SESSION['auftragsnr']);

    $query = $con->prepare(
        "SELECT * 
        FROM Auftraege
        LEFT JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        LEFT JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR
        WHERE AuftragsNr = $auftragsnr");

    $query->execute();
    $row = $query->fetchObject();
    $arbeiten = explode(",", $row->Arbeit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<!-- onLoad="window.print()" -->
<body onLoad="window.print()">
    <h1>SERVICEAUFTRAG</h1>
    <p>------------------</p>
    <p>Datum: <?php echo $row->Datum; ?></p>
    <p>Zeit: <?php echo $row->Zeit; ?></p>
    <p>Kunde/Kontaktperson:</p>
    <p><?php echo $row->Geschlecht . " " . $row->Kunden_Vorname . " " . $row->Kunden_Name . "<br>" . $row->Adresse . "<br>" . $row->PLZ . " " . $row->Ort; ?></p>
    <p>Telefon: <?php echo $row->Telefon; ?></p>
    <p>Natel : <?php echo $row->Natel; ?></p>  
    <p>Adresse Objekt: dito</p>
    <p>Adresse Verrechnung: Da chasch genau das vom Pdf neh Shay</p>
    <p>-----------------</p>
    <p>Auszuführende Arbeiten: </p>
    <?php
        foreach($arbeiten as $value){
            $checked = "";
            if($value == "Reparatur"){
                $checked = "checked='checked'";
                break;
            }
        }
        echo "<input type='checkbox' id='reperatur' disabled='disabled' $checked>";
        echo "<lable for='reperatur'>Reperatur</lable>";

        foreach($arbeiten as $value){
            $checked = "";
            if($value == "Sanitaer"){
                $checked = "checked='checked'";
                break;
            }
        }
        echo "<input type='checkbox' id='sanitaer' disabled='disabled' $checked>";
        echo "<lable for='sanitaer'>Sanitär</lable>";

        foreach($arbeiten as $value){
            $checked = "";
            if($value == "Heizung"){
                $checked = "checked='checked'";
                break;
            }
        }
        echo "<input type='checkbox' id='heizung' disabled='disabled' $checked>";
        echo "<lable for='heizung'>Heizung</lable>";

        foreach($arbeiten as $value){
            $checked = "";
            if($value == "Garantie"){
                $checked = "checked='checked'";
                break;
            }
        }
        echo "<input type='checkbox' id='garantie' disabled='disabled' $checked>";
        echo "<lable for='garantie'>Garantie</lable>";
    ?>
    <p><?php echo $row->Beschreibung; ?></p>
    <p>-------------</p>
    <p>Terminwunsch: <?php echo $row->Terminwunsch; ?></p>
</body>
</html>