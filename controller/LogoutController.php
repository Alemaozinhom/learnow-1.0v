<?php
    session_start();

    if ($_SESSION['LOGIN']=='true') 
    {
        session_destroy();
        header("Location: /learnow");
        
    } else {
        header('Location: /learnow/403.php');
    }
?>