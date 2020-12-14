<?php
    if ($_POST['auth']=='true') 
    {
        setcookie('auth', 'true', time()+3, "/");
        header("Location: /learnow/enviado-email");
    } else {
        header('Location: /learnow/403.php');
    }
?>