<?php session_start();
    session_destroy();
    header("Location: index.php");
    die;

    /**
     * dieses File kann im header von jedem User über einen Button ausgewählt werden <br>
     * es beendet die Session in welcher alle User infos gespeichert sind und er wird danach zur index datei geleitet <br>
     * bei welcher er sich neu anmelden kann.
     */
?>