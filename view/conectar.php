<?php
    session_start();

    if (isset($_SESSION['LOGIN'])) {
        header("Location: perfil");
    }

	// ---- Cookies ----
	$checkbox = null;
	$email = null;
	$password = null;

	if(isset($_COOKIE['remember']))
	{
		$checkbox = $_COOKIE['remember'];
		$email = $_COOKIE['email'];
		$password = $_COOKIE['password'];
	}
?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow - Conectar</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="view/styles.css">

        </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="view/img/horizontal_on_white_by_logaster.png" class="img-navbar">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item" id="btnNav">
                        <a class="btn" style="color:white;" href="/learnow">Home</a>
                    </li> 
                    <li class="nav-item" id="btnNav">
                        <a class="btn" style="color:white;" href="sobre">Sobre</a>
                    </li> 
                    <li class="nav-item" id="btnNav">
                        <a class="btn" style="color:white;" href="contato">Contato</a>
                    </li> 
                    <li class="nav-item" id="btnNav">
                        <a class="btn  btn-outline-light" href="cadastrar">Cadastrar-se</a>
                    </li> 
                </ul>
            </div>
        </nav>
        <section id="cover" class="top" style="height: 95%;">
            <div id="cover-caption">        	
                <div class="container" id="cnt-menu">
                <?php               
                    if (!empty($_COOKIE['info'])) 
                    {
                        print($_COOKIE['info']);
                        setcookie('info', null, time()-1, "/");
                    }          
                ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="view/img/login<?php print(rand(1,6)); ?>.png" id="img-login">
                        </div>
                        <div class="col-sm-5 colun">
                            <label class="h1">Conectar-se</label>
                            <br>Insira seus dados para entrar
                        </div>
                    </div>
                    <div class="row login-bottom">
                        <div class="col-sm-12">     
                            <form action="controller/LoginController.php" method="POST">
                                <input type='text' name='auth' value='true' style='display:none;'>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email do Usuário" value="<?php echo $email; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword">Senha</label>
                                        <input type="password" class="form-control" name="password" id="inputPassword" value="<?php echo $password; ?>" placeholder="********" required>
                                    </div>
                                    
                                </div>           
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" name="remember" type="checkbox" id="gridCheck" <?php echo $checkbox; ?>>
                                        <label class="form-check-label" for="gridCheck">Lembrar de mim</label>
                                    </div>
                                </div>
                                <div class="btn-align">
                                    <button type="submit" class="btn btn-outline-primary">Entrar</button>
                                    <a href="reset">Esqueci minha senha</a>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <footer class="navfooter">
            <div class="row">
            <div class="col-12 mb-3 col-md">
                <img src="view/img/logob.png" style="height: 25px;">
                <small class="text-muted mr-3">&copy; 2020</small>
                <small class="text-muted">Desenvolvido por Eduardo Martins Padilha, Gabriel da Silveira Tedeschi e Gabriela Rosa Silva</small>   
            </div>
        </footer>
    </body>
</html>