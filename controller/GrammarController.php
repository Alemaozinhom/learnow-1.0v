<?php
    if (isset($_POST['cost'])) {
        if ($_POST['cost']>0) {
            require_once "../service/user.php";
            require_once "../service/grammar.php";
            require_once "../service/question.php";
            $GrammarController = new GrammarController();
            $GrammarController->buyGrammar();
        }
    }

    require "service/user.php";
    require "service/grammar.php";
    require "service/question.php";

    class GrammarController
    {
        private $User, $Grammar, $Question;   
        private $ID, $Title, $Content;

        public function __construct()
        {
            $this->Grammar = new Grammar();
            $this->User = New User();
            $this->Question = new Question($this->Grammar,$this->User);
        }

        public function getQuestions()
        {
            $this->Question->getQuestion();
        }

        public function getQuestionResults()
        {
            $this->Question->getQuestionResult();
        }

        public function getTitle()
        {
            return $this->Title[0];
        }

        public function getGrammar()
        {
            echo "
                <div class='col colunLesson'>
                    Lesson: ".$this->Title[0]."
                </div>  
                ". $this->Content[0]
            ;
                        
        }

        public function loadGrammar($id)
        {
            $this->ID = $this->Grammar->setid($id);

            $this->Grammar->ConstructQuestion();
            $this->Title = $this->Grammar->getTitle();
            $this->Content = $this->Grammar->getContent();

            $this->Question->getInfo();        
        }

        public function buyGrammar()
        {
            $execute = $this->Grammar->ConstructMenuButton($_POST['ID']);
            if($execute == 2)
            {
                $remove = $this->User->removePoints($_SESSION['ID'],$_POST['cost']);
                
                if(!$remove)
                {
                    header('Location: perfil');
                } else {
                    $this->User->createGramProf($_SESSION['ID'],$_POST['ID']);
                }
            }
            header("Location: /learnow/perfil");
        }

        public function confirmResults()
        {
            $R1 = $this->Grammar->VerifyResult($_POST['question1Id']);
            $R2 = $this->Grammar->VerifyResult($_POST['question2Id']);
            $R3 = $this->Grammar->VerifyResult($_POST['question3Id']);

            $total = 0;
            if ($R1 == $_POST['question1']) {
                $total += $_POST['question1Points'];
                $this->User->updatePoints($_SESSION['ID'],$_POST['question1Points']);
            }

            if ($R2 == $_POST['question2']) {
                $total += $_POST['question2Points'];
                $this->User->updatePoints($_SESSION['ID'],$_POST['question2Points']);
            }

            if ($R3 == $_POST['question3']) {
                $total += $_POST['question3Points'];
                $this->User->updatePoints($_SESSION['ID'],$_POST['question3Points']);
            }

            if ($total==0) {
                $this->User->updatePoints($_SESSION['ID'],25);
                $total = 20;
            }

            return $total;
        }

        public function checkedGrammar($grammar)
        {
            $this->User->checkedGrammar($grammar);
        }

    }
?>