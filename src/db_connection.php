<?php
    /**
     * Sas db_connection file wir mit require in andre files eingebunden um eine Datenbank verbindung herzustellen
     */
    $con = new PDO("mysql:host=localhost;dbname=M295_Projekt", "root", "") 
    or die("Keine Verbindung möglich");
?>