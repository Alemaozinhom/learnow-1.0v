<?php 
    $auth = true;
    
    require_once "service/user.php";
    require_once "controller/ProfileController.php";

    if (!($_SESSION['LOGIN']=='true')) 
    {
        header('Location: conectar');
    }

    $Profile = new Profile();

    $Profile->loadGrammar();
    $Profile->loadComprehension();
?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow - Perfil</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="view/styles.css">

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>

    <body> 
        <?php $Profile->createGrammarModels(); ?>
        <?php $Profile->createComprehensionModels(); ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="view/img/horizontal_on_white_by_logaster.png" class="img-navbar">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                    <label class="title">Bem-vindo(a) <?php print($_SESSION['USERNAME']); ?></label>
                    </li> 
                </ul>
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item" id="btnNav">
                        <img src="view/img/coin.png" class="icon-coin">
                        <label class="points"><?php echo $Profile->getPoints(); ?></label>
                    </li>
                    <li class="nav-item" id="btnNav">
                    <label class="bar">|</label>
                    </li>
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
                        <a class="btn" style="color:white;" href="ajustes">Ajustes</a>
                    </li>
                    <li class="nav-item" id="btnNav">
                        <a class="btn btn-outline-light" href="controller/LogoutController.php">Sair</a>
                    </li> 
                </ul>
            </div>
        </nav>
        <section id='cover' style='height: auto; margin-bottom: 10px;'>
            <div id='cover-caption'>

                <div class="container" id="cnt-perfil">
                    <div class="row perfil">
                        <div class="col-sm-3" style="margin-left: 60px;">
                            <img src="view/img/perfil<?php print(rand(1,6)); ?>.png" class="card-img-top" id="img-perfil">
                        </div>
                        <div class="col-sm-8 colun" style="margin-left: -50px;">
                            <label class="h1">Gramática</label>
                            <br>Veja aqui materias de gramática
                        </div>
                    </div>
                    <div class="row perfil">
                        <div class="col-sm-10" style="margin-left: -25px; text-indent: 3ch;">
                            Para a escrita ela é fundamental mas não se limita a isso, um aluno fluente pode ser facilmente compreendido em um
                            dialogo direto mas não compreende muitas funcionalidade e regras uteis para a elaboração de uma oratória, formalidade
                            é importante desde o principio do estudo, por isso a gramática aqui tem seu foco!
                        </div>
                    </div>
                    <br>
                </div>

                <div class="container">
                    <div id="carouselGrammar" class="carousel slide" data-ride="carousel" data-interval="false">
                        <ol class="carousel-indicators indicator">
                            <?php echo $Profile->printCabGrammar(); ?>
                        </ol>
                        <div class="carousel-inner">
                            <div class="row">
                                        <?php echo $Profile->printGrammar(); ?>
                            </div>                   
                        </div>
                        <a class="carousel-control-prev prev" href="#carouselGrammar" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next next" href="#carouselGrammar" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div> 

                <div class="container" id="cnt-perfil">
                    <div class="row perfil">
                        <div class="col-sm-3" style="margin-left: 60px;">
                            <img src="view/img/comp<?php print(rand(1,6)); ?>.png" class="card-img-top" id="img-perfil">
                        </div>
                        <div class="col-sm-8 colun" style="margin-left: -50px;">
                            <label class="h1">Compreensão</label>
                            <br>Veja aqui materias de compreensão
                        </div>
                    </div>
                    <div class="row perfil">
                        <div class="col-sm-10" style="margin-left: -25px; text-indent: 3ch;">
                            Essencial para uma evolução continua na língua, muito do conhecimento da compreensão parte de consumir inglês
                            o máximo que você puder, LearNow dá os direcionamentos e o  auxílio na pratica, mas não se limite ao que te entregamos
                            do que você gosta? Musica? Filmes? Jogos? Dentro do seu mundinho é mais fácil aprender.
                        </div>
                    </div>
                    <br>
                </div>

                <div class="container">
                    <div id="carouselComprehension" class="carousel slide" data-ride="carousel" data-interval="false">
                        <ol class="carousel-indicators indicator">
                            <?php echo $Profile->printCabComprehension(); ?>
                        </ol>
                        <div class="carousel-inner">
                            <div class="row">
                                        <?php echo $Profile->printComprehension(); ?>
                            </div>                   
                        </div>
                        <a class="carousel-control-prev prev" href="#carouselComprehension" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next next" href="#carouselComprehension" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
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