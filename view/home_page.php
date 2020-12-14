<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow</title>

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
                        <a class="btn" style="color:white;" href="sobre">Sobre</a>
                    </li>
                    <li class="nav-item" id="btnNav">
                        <a class="btn" style="color:white;" href="contato">Contato</a>
                    </li> 
                    <?php
                        if (isset($_SESSION['LOGIN'])) {
                            echo "
                                <li class='nav-item' id='btnNav'>
                                    <a class='btn' style='color:white;' href='perfil'>Perfil</a>
                                </li> 
                                <li class='nav-item' id='btnNav'>
                                    <a class='btn  btn-outline-light' href='controller/LogoutController.php'>Sair</a>
                                </li> 
                            ";
                            $name = $_SESSION['USERNAME'];
                            $email = $_SESSION['EMAIL'];
                        } else {
                            echo "
                                <li class='nav-item' id='btnNav'>
                                    <a class='btn' style='color:white;' href='cadastrar'>Cadastrar-se</a>
                                </li> 
                                <li class='nav-item' id='btnNav'>
                                    <a class='btn  btn-outline-light' href='conectar'>Conectar-se</a>
                                </li> 
                            ";
                            $name = '';
                            $email = '';
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <section id="cover" class="top" style="height: 95%;">
            <div id="cover-caption">
                <div class="container">
                    <div class="row justify-content-md-center">     
                        <div class='card' id='cnt-home'>
                            <div class="row home-title">
                                <div class="col-sm-3">
                                    <img src="view/img/home.png" class="img-title">
                                </div>
                                <div class="col-sm-8 colun">
                                    <label class="h1 text-home-title">LearNow</label>
                                    <br/>
                                    <label class="text-home-subtitle">Aprenda agora mesmo em qualquer lugar!</label>                         
                                </div>
                            </div>            
                            <img src='view/img/tumb.jpg' class='card-img-top home-img'> 
                            <div class='card-body'>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card" id="home-card">
                                            <div class="card-body">
                                                <h5>Cadastre-se</h5>
                                                <p class="card-text">Ainda não tem uma conta? Entre aqui para criar uma e conheça uma nova forma de aprender inglês.</p>
                                                <a href="cadastrar" class="btn btn-outline-primary">Cadastro</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card" id="home-card">
                                            <div class="card-body">
                                                <h5>Continue estudando</h5>
                                                <p class="card-text">Já possui uma conta? Entre aqui para acessar seu perfil pessoal e dar continuidade em seus estudos.</p>
                                                <a href="conectar" class="btn btn-primary">Entrar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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