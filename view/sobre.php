<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow - Sobre</title>

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
        <section id="cover" class="top-about" style="height: auto;">
            <div id="cover-caption" style="margin-bottom: 30px;">        	
                <div class="container" id="cnt-about">
                    <div class="row" id="about">
                        <div class="col-sm-3">
                            <img src="view/img/about.png" id="img-about">
                        </div>
                        <div class="col-sm-8 colun" >
                            <label class="h1">Sobre</label>
                            <br/>Conheça quem somos e o que propomos!
                        </div>
                    </div>
                    <div class="row" id="about">
                        <div class="col-sm-8 colun" style="margin-top: 20px;">
                            <label class="p">
                                LearNow é um projeto criado pelos desenvolvedores Eduardo Martins Padilha, Gabriel da Silveira Tedeschi 
                                e Gabriela Rosa Silva em âmbito do desenvolvimento do trabalho de conclusão de curso de informática.
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <img src="view/img/whoare.png" id="img-about">
                        </div>              
                    </div>
                    <div class="row" id="about">                  
                        <div class="col-sm-3">
                            <img src="view/img/whatis.png" id="img-about">
                        </div>   
                        <div class="col-sm-8 colun" style="margin-top: 5px;">
                            <label class="p">
                                O objetivo do LearNow é oferecer a um público jovem, a capacidade de aprender a língua inglesa em um
                                ambiente simples, porém recheado de materias para aprender gramática e a compreensão da língua mais falada no mundo!
                            </label>
                        </div>           
                    </div>
                    <div class="row" id="about">
                        <div class="col-sm-8 colun" style="margin-top: 25px;">
                            <label class="p">
                                Graças a assimilação fácil e intuitiva da plataforma e os materiais completos que variam desde vídeos e artigos sobre
                                pronunciação, compreensão da língua, hábitos e até mesmo questionários de fixação, a experiência do usuário se torna cada vez mais completa.
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <img src="view/img/howfcomp.png" id="img-about">
                        </div>              
                    </div>
                    <div class="row" id="about">                  
                        <div class="col-sm-3">
                            <img src="view/img/howfgrammar.png" id="img-about">
                        </div>   
                        <div class="col-sm-8 colun" style="margin-top: 20px;">
                            <label class="p">
                                E caso a gramática seja o seu calcanhar de Aquiles, não se preocupe, inúmeros conteúdos completos, repletos de exemplos e exercícios para a
                                prática, aguardam ansiosamente para aliviar o peso em seus ombros.
                            </label>
                        </div>           
                    </div>
                    <div class="row">                                    
                        <div class="col-sm-8 colun" style="margin-top: 20px;">
                            <label class="p">
                                Além disso, seus esforços não serão em vão, utilizando um sistema de moedas para a escolha das aulas, cada aluno será recompensado após o final
                                de cada classe com uma determinada quantidade de moedas de acordo com seu desempenho.
                            </label>
                        </div>   
                        <div class="col-sm-3">
                            <img src="view/img/howdoit<?php print(rand(1,5)); ?>.png" id="img-about">
                        </div>           
                    </div>
                    <br>
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