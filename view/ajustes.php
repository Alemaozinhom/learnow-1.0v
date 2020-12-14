<?php 
    session_start(); 

    if (!($_SESSION['LOGIN']=='true')) 
    {
        header('Location: 403.php');
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

        <title>LearNow - Ajustes</title>

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
        <!-- Modal Excluir conta -->
        <div class='modal fade' id='conta' tabindex='-1' role='dialog' aria-labelledby='model' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='conta'>Excluir conta</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Cancelar'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        Para excluir a conta insira sua senha:
                        <form action="controller/DeleteController.php" method="post">
                            <br>
                            <input type="password" name="password" class="form-control" placeholder="Senha" required>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck">Estou ciente que não posso recuperar essa conta</label>
                            </div>                
                            <div class='modal-footer'>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="action" class="btn btn-danger">Excluir conta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Mudar Senha -->
        <div class='modal fade' id='senha' tabindex='-1' role='dialog' aria-labelledby='model' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='senha'>Mudar senha</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Cancelar'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        Para mudar sua senha preencha os campos:
                        <form action="controller/ChangeController.php" method="post">
                            <br>
                            <label for="old">Senha atual</label>
                            <input type="password" name="old" class="form-control" placeholder="Senha atual" required>
                            <br>
                            <label for="new">Nova senha</label>
                            <input type="password" name="new" class="form-control" placeholder="Nova senha" required>
                            <br>
                            <label for="newconf">Confirmar nova senha</label>
                            <input type="password" name="newconf" class="form-control" placeholder="Confirmar senha" required>
                            </div>
                            <div class='modal-footer'>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="action" class="btn btn-primary">Mudar a senha</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="view/img/horizontal_on_white_by_logaster.png" class="img-navbar">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-md-auto">                
                    <li class="nav-item" id="btnNav">
                        <a class="btn btn-outline-light" href="perfil">Voltar</a>
                    </li> 
                </ul>
            </div>
        </nav>
        <section id="cover" class="top" style="height: 95%;">
            <div id="cover-caption">
                <div class="container" id="cnt-ajustes">
                    <?php
						if (!empty($_COOKIE['info']))  
						{
							print($_COOKIE['info']);
						}          
					?>
                    <div class="row">
                        <div class="col">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item">
                                <a class="nav-link active">Informações</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="view/img/edit<?php print(rand(1,6)); ?>.png" id="img-ajustes">
                                    </div>
                                    <div class="col-sm-8" id="ajustes">
                                        <label class="h4"><?php print($_SESSION['USERNAME']); ?></label>
                                        <br>
                                        <label class="h5"><?php print($_SESSION['EMAIL']); ?></label>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#conta">Cique para excluir a conta</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="view/img/password2.png" id="img-ajustes">
                                    </div>
                                    <div class="col-sm-8" id="ajustes">
                                        <label class="h4">Senha</label>
                                        <br>
                                        <a href="" data-toggle="modal" data-target="#senha">Clique para mudar a senha</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="view/img/suport<?php print(rand(1,5)); ?>.png" id="img-ajustes">
                                    </div>
                                    <div class="col-sm-8" id="ajustes">
                                        <label class="h4">Suporte</label>
                                        <br>
                                        <a href="contato">Clique para falar com o suporte</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="reset-tab">...</div>
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