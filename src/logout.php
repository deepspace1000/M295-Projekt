<?php
    session_start();
        if(isset($_POST['logout']))
        {
            header("Location: index.php");
            session_destroy();
        }
        else
        {
            header("Location: index.php");
            session_destroy();
        }
?>