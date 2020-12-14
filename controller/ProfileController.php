<?php
    require_once "service/grammar.php";
    require_once "service/comprehension.php";
    require_once "service/user.php";

    if (!($auth==true)) {
        header('Location: /learnow/403.php');
    }
        
    class Profile
    {
        private $Grammar, $Comprehension, $User;
        private $Gid, $Gtitle, $Gcust, $Gcount;
        private $Cid, $Ctitle, $Ccust, $Ccount;

        public function __construct()
        {
            $this->Grammar = new Grammar();
            $this->Comprehension = new Comprehension();
            $this->User = new User();
        }

        public function getPoints()
        {
            return $this->User->actualyPoints($_SESSION['ID']);
        }

        public function loadGrammar()
        {
            $this->Grammar->ConstructQuestion();
            $this->Gcount = $this->Grammar->getCount();
            $this->Gid = $this->Grammar->getid();
            $this->Gtitle = $this->Grammar->getTitle();
            $this->Gcust = $this->Grammar->getPointCust();
        }

        public function loadComprehension()
        {
            $this->Comprehension->ConstructQuestion();
            $this->Ccount = $this->Comprehension->getCount();
            $this->Cid = $this->Comprehension->getid();
            $this->Ctitle = $this->Comprehension->getTitle();
            $this->Ccust = $this->Comprehension->getPointCust();
        }

        public function createGrammarModels()
        {           
            for ($i=0; $i < $this->Gcount; $i++)
            { 

                $STT = $this->Grammar->ConstructMenuButton($this->Gid[$i]);
                $Points = $this->User->actualyPoints($_SESSION['ID']);

                if ($STT == 2)
                {
                    if (($Points-$this->Gcust[$i])>0)
                    {
                        echo "
                            <div class='modal fade' id='model".$this->Gid[$i]."' tabindex='-1' role='dialog' aria-labelledby='model' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='model".$this->Gid[$i]."'>Comprar Aula</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cancelar'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            Você deseja comprar a aula <b>".$this->Gtitle[$i]."</b> por <b>".$this->Gcust[$i]."</b> moedas?
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                            <form action='controller/GrammarController.php' method='POST'>         
                                                <button type='submit' class='btn btn-success' class='button' value='".$this->Gid[$i]."' name='ID'>Confirmar</button> 
                                                <input type='text' name='cost' value='".$this->Gcust[$i]."' style='display:none;'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    } else {
                        echo "
                            <div class='modal fade' id='model".$this->Gid[$i]."' tabindex='-1' role='dialog' aria-labelledby='model' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='model".$this->Gid[$i]."'>Dinheiro Insuficiente</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cancelar'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            Você precisa de mais <b>".($this->Gcust[$i]-$Points)."</b> moedas para efetuar essa compra.
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            }
        }

        public function createComprehensionModels()
        {
            for ($i=0; $i < $this->Ccount; $i++)
            { 

                $STT = $this->Comprehension->ConstructMenuButton($this->Cid[$i]);
                $Points = $this->User->actualyPoints($_SESSION['ID']);

                if ($STT == 2)
                {
                    if (($Points-$this->Ccust[$i])>0)
                    {
                        echo "
                            <div class='modal fade' id='model".$this->Cid[$i]."' tabindex='-1' role='dialog' aria-labelledby='model' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='model".$this->Cid[$i]."'>Comprar Aula</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cancelar'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            Você deseja comprar a aula <b>".$this->Ctitle[$i]."</b> por <b>".$this->Ccust[$i]."</b> moedas?
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                            <form action='controller/ComprehensionController.php' method='POST'>         
                                                <button type='submit' class='btn btn-success' class='button' value='".$this->Cid[$i]."' name='ID'>Confirmar</button> 
                                                <input type='text' name='cost' value='".$this->Ccust[$i]."' style='display:none;'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                    } else {
                        echo "
                            <div class='modal fade' id='model".$this->Cid[$i]."' tabindex='-1' role='dialog' aria-labelledby='model' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='model".$this->Cid[$i]."'>Dinheiro Insuficiente</h5>
                                            <button type='button' class='close' data-dismiss='modal' aria-label='Cancelar'>
                                            <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        <div class='modal-body'>
                                            Você precisa de mais <b>".($this->Ccust[$i]-$Points)."</b> moedas para efetuar essa compra.
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            }
        }

        public function printCabGrammar()
        {
            $count = $this->Gcount;

            $j = 2;
            $y = 1;
            for ($i=0; $i < $count; $i++) { 
                if ($j==2) {
                    if ($i==0) {
                        echo "<li data-target='#carouselGrammar' data-slide-to='0' class='active'></li>";
                    } else {
                        echo "<li data-target='#carouselGrammar' data-slide-to='".$y."'></li>";
                        $y++;
                    }
                    $j = 0;
                } else {
                    $j++;
                }         
            }
        }

        public function printCabComprehension()
        {
            $count = $this->Ccount;

            $j = 2;
            $y = 1;
            for ($i=0; $i < $count; $i++) { 
                if ($j==2) {
                    if ($i==0) {
                        echo "<li data-target='#carouselComprehension' data-slide-to='0' class='active'></li>";
                    } else {
                        echo "<li data-target='#carouselComprehension' data-slide-to='".$y."'></li>";
                        $y++;
                    }
                    $j = 0;
                } else {
                    $j++;
                }         
            }
        }

        public function printGrammar()
        {   
            $j = 0;
            for ($i = 0; $i <= $this->Gcount; $i++)
            {
                $STT = $this->Grammar->ConstructMenuButton($this->Gid[$i]);
                $TextBtn = $this->User->TextBtn($STT); 

                if ($i==0) {
                    echo "<div class='carousel-item active'>";                 
                }
                if (($j==0) AND ($i!=0)) {
                    echo "<div class='carousel-item'>";  
                }

                if ($TextBtn == 'Iniciar Aula')
                {
                    $Btn = 'outline-success';
                } else {
                    $Btn = 'outline-secondary';
                }

                if($STT==2){
                    $button = "<button type='button' data-toggle='modal' data-target='#model".$this->Gid[$i]."' class='btn btn-outline-primary'>".$TextBtn."</button>";											
                } else {            
                    $button = "
                        <form action='lesson-grammar' method='POST'>         
                            <button type='submit' class='btn btn-$Btn' class='button' value='".$this->Gid[$i]."' name='ID'>".$TextBtn."</button> 
                            <input type='text' name='cost' value='0' style='display:none;'>
                            <input type='text' name='btn' value='$TextBtn' style='display:none;'>
                        </form>
                    ";
                }

                echo "
                    <div class='col'>
                        <div class='card' id='cnt-profile'>
                            <img src='view/img/lesson".($i+1).".png' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$this->Gtitle[$i]."</h5>
                                <p class='card-text'>
                                    Nível: ".($i+1)."
                                    <br> Custo: ".$this->Gcust[$i]."
                                    <img src='view/img/coin.png' width='25px' height='auto' style='margin-left: 0%;'>
                                    <br> Conclusão: ".(2*($i+1)+3)." minutos
                                </p>
                                ".$button."
                            </div>
                        </div>
                    </div>
                ";
                if ($j==2) {
                    echo "</div>";  
                    $j = 0;
                } else {
                    $j++;
                }
            }
            
        }

        public function printComprehension()
        {   
            $j = 0;
            for ($i = 0; $i <= $this->Ccount; $i++)
            {
                $STT = $this->Comprehension->ConstructMenuButton($this->Cid[$i]);
                $TextBtn = $this->User->TextBtn($STT); 

                if ($i==0) {
                    echo "<div class='carousel-item active'>";                 
                }
                if (($j==0) AND ($i!=0)) {
                    echo "<div class='carousel-item'>";  
                }

                if ($TextBtn == 'Iniciar Aula')
                {
                    $Btn = 'outline-success';
                } else {
                    $Btn = 'outline-secondary';
                }

                if($STT==2){
                    $button = "<button type='button' data-toggle='modal' data-target='#model".$this->Cid[$i]."' class='btn btn-outline-primary'>".$TextBtn."</button>";											
                } else {            
                    $button = "
                        <form action='lesson-comprehension' method='POST'>         
                            <button type='submit' class='btn btn-$Btn' class='button' value='".$this->Cid[$i]."' name='ID'>".$TextBtn."</button> 
                            <input type='text' name='cost' value='0' style='display:none;'>
                        </form>
                    ";
                }

                echo "
                    <div class='col'>
                        <div class='card' id='cnt-profile'>
                            <img src='view/img/lesson".($i+1).".png' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$this->Ctitle[$i]."</h5>
                                <p class='card-text'>
                                    Nível: ".($i+1)."
                                    <br> Custo: ".$this->Ccust[$i]."
                                    <img src='view/img/coin.png' width='25px' height='auto' style='margin-left: 0%;'>
                                    <br> Conclusão: ".(2*($i+1)+3)." minutos
                                </p>
                                ".$button."
                            </div>
                        </div>
                    </div>
                ";
                if ($j==2) {
                    echo "</div>";  
                    $j = 0;
                } else {
                    $j++;
                }
            }
            
        }
    }
?>