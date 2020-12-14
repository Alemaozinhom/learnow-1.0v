<?php 

    if (!isset($_POST['question1'])) 
    {
        header('Location: 403.php');
    }

    require "controller/GrammarController.php";

    $GrammarController = new GrammarController();
    $GrammarController->loadGrammar($_POST['ID']);
?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow - Grammar Lesson Respostas</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="view/styles.css">

    </head>
    <body>
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
                        <a class="btn btn-outline-light" href="/learnow/perfil">Voltar</a>
                    </li> 
                </ul>
            </div>
        </nav>

        <section id="cover" style="height: auto;">
            <div id="cover-caption">

                <?php $GrammarController->getQuestionResults(); ?>

                <div class="container" id="cnt-enviarBox">
                    <div class="row">
                        <div class="col">
                            <a href="perfil"  class='btn btn-success enviar'>Voltar para o Perfil</a>
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
            </div>
        </footer>

    </body>
</html>