<?php
    require_once "../service/user.php";

    if (isset($_POST['email'])) 
    {
        // ---- Chamando e atribuindo valores na classe User ----
        $User = new User();
        $User->setEmail($_POST['email']);
        $User->setPassword(md5($_POST['password']));

        // ---- Realizando a autenticação ----
        $auth = $User->auth(1);
        if (is_null($auth)) 
        {
            //Email ou senha errados
            $dados = "<div class='alert alert-danger' role='alert' id='alert'>O email ou senha estão errados!</div>";
            setcookie('info', $dados, time()+60, "/");

            header('Location: ../conectar');

        } else {
            $User->loadProfile();
            //Login feito com sucesso
            header('Location: ../perfil');     

            // ---- Verificando o remember-me ----
            if (isset($_POST['remember'])) {
                setcookie('email', $_POST['email'], time()+3600*25*30, "/");
                setcookie('password', $_POST['password'], time()+3600*25*30, "/");
                setcookie('remember', 'checked', time()+3600*25*30, "/");
            } else {
                setcookie('email', null, time()-1, "/");
                setcookie('password', null, time()-1, "/");
                setcookie('remember', null, time()-1, "/");
            }
        }        
    } else {
        header('Location: /learnow/403.php');
    }
?>