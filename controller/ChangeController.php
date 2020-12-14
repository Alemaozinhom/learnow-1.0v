<?php
    if (isset($_POST['old'])) 
    {
        require_once "../service/user.php";

        if ($_POST['new']==$_POST['old'])
        {
            $dados = "<div class='alert alert-danger' role='alert-ajustes' id='alert-ajustes' >As senha atual e nova não podem ser iguais!</div>";

            setcookie('info', $dados, time()+5, "/");
            header("Location: ../ajustes");
        }
        elseif ($_POST['new']==$_POST['newconf'])
        {
            $User = new User();
            $User->setEmail($_SESSION['EMAIL']);
            $User->setPassword(md5($_POST['old']));
            
            if ($User->auth(1)==$_SESSION['ID']) 
            {
                $User->setPassword(md5($_POST['new']));
                $User->updateProfile();

                $dados = "<div class='alert alert-success' role='alert-ajustes' id='alert-ajustes' >Senha alterada com sucesso!</div>";

                setcookie('info', $dados, time()+5, "/");
                header("Location: ../ajustes");
            } else {
                $dados = "<div class='alert alert-danger' role='alert-ajustes' id='alert-ajustes' >A senha atual não esta correta!</div>";

                setcookie('info', $dados, time()+5, "/");
                header("Location: ../ajustes");
            }
        } else {
            $dados = "<div class='alert alert-danger' role='alert-ajustes' id='alert-ajustes' >A nova senha e sua confirmação não batem!</div>";

            setcookie('info', $dados, time()+5, "/");
            header("Location: ../ajustes");
        }
  
    } else {
        header('Location: /learnow/403.php');
    }
?>