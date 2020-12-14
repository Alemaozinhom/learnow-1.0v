<?php
    require_once "../service/user.php";

    if ($_POST['auth']=='true') 
    {
        // ---- Confirmando as senhas ----
        if ($_POST['password'] == $_POST['reptpassword']) 
        {
            // ---- Chamando e atribuindo valores na classe User ----
            $User = new User();
            $User->setEmail($_POST['email']);
            $User->setUsername($_POST['username']);
            $User->setPassword(md5($_POST['password']));

            // ---- Realizando a autenticação ----
            $auth = $User->auth(0);
            if (is_null($auth))
            {  
                $User->createProfile();
                
                header('Location: ../concluido-cadastro');              
            } else {
                //Email ja em uso
                $dados = "<div class='alert alert-danger' role='alert' id='alert' >O email já está em uso!</div>";
                
                setcookie('info', $dados, time()+60, "/");
                header('Location: ../cadastrar');
            }  
        } else {
            //Senhas não batem
            $dados = "<div class='alert alert-danger' role='alert' id='alert'>As senhas não batem!</div>";
                
            setcookie('info', $dados, time()+60, "/");
            header('Location: ../cadastrar');
        }
        setcookie('auth', 'true', time()+3, "/");
        
    } else {
        header('Location: /learnow/403.php');
    }
?>