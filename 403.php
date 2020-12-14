<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow - 403</title>

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
                        } else {
                            echo "
                                <li class='nav-item' id='btnNav'>
                                    <a class='btn' style='color:white;' href='cadastrar'>Cadastrar-se</a>
                                </li> 
                                <li class='nav-item' id='btnNav'>
                                    <a class='btn  btn-outline-light' href='conectar'>Conectar-se</a>
                                </li> 
                            ";
                        }
                    ?>
                </ul>

            </div>
        </nav>
        <section id="cover" class="top-cont" >
            <div id="cover-caption">
                <div class="container" id="cnt-menu">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="view/img/nopermission.png" id="img-native">
                        </div>
                        <div class="col-sm-8 colun">
                            <label class="h1">Você não tem permissão para isso!</label>
                            <br>A url inserida não pode ser acessada :(
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
        <footer class="navfooter">
            <div class="row">
            <div class="col-12 mb-3">
                <img src="view/img/logob.png" style="height: 25px;">
                <small class="text-muted mr-3">&copy; 2020</small>
                <small class="text-muted">Desenvolvido por Eduardo Martins Padilha, Gabriel da Silveira Tedeschi e Gabriela Rosa Silva</small>   
            </div>
        </footer>
    </body>

    </html>