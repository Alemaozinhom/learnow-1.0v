<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt_br">
    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Plataforma online para estudos da língua inglesa! Aprenda gramática e compreensão de uma forma mais dinâmica e completa.">
        <meta name="author" content="LearNow">

        <link rel="icon" type="image/png" sizes="96x96" href="view/img/favicon-32x32.png">

        <title>LearNow - Contato</title>

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
        <section id="cover" class="top-cont" style="height: 92%;">
            <div id="cover-caption">        	
                <div class="container" id="cnt-menu">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="view/img/contact<?php print(rand(1,6)); ?>.png" id="img-contact">
                        </div>
                        <div class="col-sm-6 colun">
                            <label class="h1">Contato</label>
                            <br>Envie suas dúvidas e opniões para nós!
                        </div>
                    </div>
                    <div class="row login-bottom">
                        <div class="col-sm-12">     
                            <form action="controller/ContatoController.php" method="POST">       
                                <input type='text' name='auth' value='true' style='display:none;'>
                                <div class="form-row">                       
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Nome</label>
                                        <input type="text" class="form-control" name="name" id="inputName" placeholder="Nome" value="<?php print($name); ?>" required>
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label for="inputPhone">Telefone</label>
                                        <input type="tel" class="form-control" name="phone" id="inputPhone" placeholder="Número de telefone" value="" required>
                                    </div>  
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?php print($email); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAssunto">Assunto</label>
                                        <select name="assunt" id="inputAssunto" class="form-control" required>
                                            <option value="" disabled selected>Selecione uma opção</option>
                                            <option value="duvidas">Dúvidas</option>
                                            <option value="problemas">Problemas</option>
                                            <option value="sujestao">Sujestões</option>
                                            <option value="criticas">Críticas</option>
                                            <option value="outros">Outros</option>
                                        </select>
                                    </div>  
                                    <div class="form-group col-md-12">
                                        <label for="inputTextArea">Descrição</label>
                                        <textarea name="text" id="inputTextArea" placeholder="Escreva o conteúdo do assunto aqui" class="form-control" row="3" col="60" required></textarea>
                                    </div>            
                                </div>           
                                <div class="btn-align">
                                    <button type="submit" class="btn btn-outline-primary">Enviar</button>
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