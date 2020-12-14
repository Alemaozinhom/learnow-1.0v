<?php
    if ($_POST['password']==true) 
    {
        require_once "../service/user.php";

        $User = new User();
        $User->setEmail($_SESSION['EMAIL']);
        $User->setPassword(md5($_POST['password']));

        if ($User->auth(1)==$_SESSION['ID'])
        {
            $User->deleteProfile();
            session_destroy();
            session_unset();
            setcookie('auth', 'true', time()+5, "/");
            header("Location: ../conta-excluida");
        } else {
            $dados = "<div class='alert alert-danger' role='alert-ajustes' id='alert-ajustes' >Senha incorreta!</div>";

            setcookie('info', $dados, time()+5, "/");
            header("Location: ../ajustes");
        }

    } else {
        header('Location: /learnow/403.php');
    }
?>