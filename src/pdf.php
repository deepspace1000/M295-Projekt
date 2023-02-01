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
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="stylesheet" href="style_pdf.css">
</head>
<!-- onLoad="window.print()" -->
<body>
    <h1>SERVICEAUFTRAG</h1>
    <p1>_________________________________________________________________________________________________</p1>

    <table>
        <tr>
            <td><b>Datum: </b></td>
            <td class="text1"><?php echo $row->Datum; ?></td>
            <td><b>Zeit: </b></td>
            <td class="text1"><?php echo $row->Zeit; ?></td>
        </tr>

        <tr>
            <td><b>Kunde/Kontaktperson: </b></td>
            <td class="text2"><?php echo $row->Geschlecht . " " . $row->Kunden_Vorname . " " . $row->Kunden_Name . "<br>" . $row->Adresse . "<br>" . $row->PLZ . " " . $row->Ort; ?></td>
        </tr>

        <tr>
            <td class="text3"><b>Telefon: </b></td>
            <td class="text1 text3"><?php echo $row->Telefon; ?></td>
        </tr>

        <tr>
            <td><b>Natel: </b>
            <td class="text1 text4"><?php echo $row->Natel; ?></p></td>
        </tr>

        <tr>
            <td><b>Adresse Objekt: </b></td>
            <td class="text1"><?php echo $row->Adresse_Objekt; ?></td>
        </tr>

        <tr>
            <td><b>Adresse Verrechnung: </b></td>
            <td class="text2">Herr Nils Rothe<br>Vulkanstrasse 106<br>8048 Zürich</td>
        </tr>
    </table>

    <p>_________________________________________________________________________________________________</p>
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
    <p>_________________________________________________________________________________________________</p>
    <p>Terminwunsch: <?php echo $row->Terminwunsch; ?></p>
</body>
</html>