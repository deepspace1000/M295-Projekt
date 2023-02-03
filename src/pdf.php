<?php session_start();
    if (!isset($_SESSION['userid']) || !isset($_SESSION['auftragsnr'])){
        header("Location: index.php");
        die;
    }

    /**
     * Hier wird aus einem Auftrag eine Wesbeite dargestellt welche alle infos erhält. <br>
     * Es wird automatisch die druck funktionaufgerufen wo man die Seite drucken oder als pdf exportieren kann <br>
     * Es wird nach dem export oder drucken automatisch einen Pagereload durchgeführt wo bei der user zurück zur seinen <br>
     * auftragsübersicht geleitet wird.
     */

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
    <meta http-equiv='refresh' content='0'>
    <title>PDF</title>
    <link rel="stylesheet" href="style_pdf.css">
</head>
<!-- onLoad="window.print()" -->
<body onLoad="window.print()">
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
    <table>
            <tr>
                    <td><b>Auszuführende Arbeiten: </b></td>
                    <td class="text5">
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
                        ?>
                
                        <?php
                            foreach($arbeiten as $value){
                                $checked = "";
                                if($value == "Sanitaer"){
                                    $checked = "checked='checked'";
                                    break;
                                }
                            }
                            echo "<input type='checkbox' id='sanitaer' disabled='disabled' $checked>";
                            echo "<lable for='sanitaer'>Sanitär</lable>";
                        ?>
                    </td>
     
                    <td>
                        <?php    
                            foreach($arbeiten as $value){
                                $checked = "";
                                if($value == "Heizung"){
                                    $checked = "checked='checked'";
                                    break;
                                }
                            }
                            echo "<input type='checkbox' id='heizung' disabled='disabled' $checked>";
                            echo "<lable for='heizung'>Heizung</lable>";
                        ?>

                        <?php
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
                    </td>
                </tr>
   
            <tr>
                <td><b>Beschreibung: </b></td>
                <td class="text6"><?php echo $row->Beschreibung; ?></td>
            </tr>
    </table>
    <p>_________________________________________________________________________________________________</p>
    <table>
        <tr>
            <td><b>Terminswunsch: </b></td>
            <td class="text7"><?php echo $row->Terminwunsch; ?></td>
        </tr>
    </table>
</body>
</html>