<?php session_start(); 
    if (isset($_SESSION['userid'])){
        echo "eingeloggt";
    } else{echo "nciht eingeloggt";}
?>