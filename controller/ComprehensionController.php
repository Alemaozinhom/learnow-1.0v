<?php
    header("Location: /learnow/embreve");
    
    if (isset($_POST['cost'])) {
        if ($_POST['cost']>0) {
            require_once "../service/user.php";
            require_once "../service/comprehension.php";
            require_once "../service/question.php";
            $ComprehensionController = new ComprehensionController();
            $ComprehensionController->buyComprehension();
        }
    }

    require "service/user.php";
    require "service/comprehension.php";
    require "service/question.php";

    class ComprehensionController
    {
        private $User, $Comprehension, $Question;   
        private $ID, $Title, $Content;

        public function __construct()
        {
            $this->Comprehension = new Comprehension();
            $this->User = New User();
            $this->Question = new Question($this->Comprehension,$this->User);
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

        public function getComprehension()
        {
            echo "
                <div class='col colunLesson'>
                    Lesson: ".$this->Title[0]."
                </div>  
                ". $this->Content[0]
            ;
                        
        }

        public function loadComprehension($id)
        {
            $this->ID = $this->Comprehension->setid($id);

            $this->Comprehension->ConstructQuestion();
            $this->Title = $this->Comprehension->getTitle();
            $this->Content = $this->Comprehension->getContent();

            $this->Question->getInfo();        
        }

        public function buyComprehension()
        {
            $execute = $this->Comprehension->ConstructMenuButton($_POST['ID']);
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
            $R1 = $this->Comprehension->VerifyResult($_POST['question1Id']);
            $R2 = $this->Comprehension->VerifyResult($_POST['question2Id']);
            $R3 = $this->Comprehension->VerifyResult($_POST['question3Id']);

            $total = 0;
            if ($R1 == $_POST['question1']) {
                $total += $_POST['question1Points'];
                $this->User->updatePoints($_SESSION['ID'],$_POST['question1Points']);
            }

            if ($R1 == $_POST['question2']) {
                $total += $_POST['question2Points'];
                $this->User->updatePoints($_SESSION['ID'],$_POST['question2Points']);
            }

            if ($R1 == $_POST['question3']) {
                $total += $_POST['question3Points'];
                $this->User->updatePoints($_SESSION['ID'],$_POST['question3Points']);
            }

            if ($total==0) {
                $this->User->updatePoints($_SESSION['ID'],25);
                $total = 25;
            }

            return $total;
        }

        public function checkedComprehension($Comprehension)
        {
            $this->User->checkedComprehension($Comprehension);
        }

    }
?>