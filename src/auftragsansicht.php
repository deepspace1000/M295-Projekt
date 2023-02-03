<?php session_start();
    if (!isset($_SESSION['userid'])){
        header("Location: index.php");
        die;
    }

    /**
     * Das auftragsansicht file wird nach dem erfolgreichen login aufgerufen <br>
     * und leitet den User auf die ansicht seiner hinterlegten Abteilung 
     */
    
    switch($_SESSION['abteilung']){
        case 1:
            header("Location: ansichtadmin.php");
            break;
        case 2:
            header("Location: ansichtbereichsleiter.php");
            break;
        case 3:
            header("Location: ansichtmitarbeiter.php");
            break;
    }
?>