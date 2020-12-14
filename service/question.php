<?php
    require_once "connection.php";

    class Question
    {
        private $User, $Grammar;   
        private $Content, $QuestionId, $Option, $AlternativeText, $Count, $ST, $vet, $Points;
        private $result;

        public function __construct($Grammar, $User)
        {
            $this->Grammar = $Grammar;
            $this->User = $User;
        }

        public function getInfo()
        {
            $this->Grammar->ConstructQuestionTitle();
            $this->Content = $this->Grammar->getContentO();
            $this->QuestionId = $this->Grammar->getQuestionId();
            $this->Points = $this->Grammar->getPointGain();

            $this->Grammar->ConstructAlternative();
            $this->Option = $this->Grammar->getOption();
            $this->AlternativeText = $this->Grammar->getContentA();
            $this->Count = $this->Grammar->getCount();

            $this->ST = $this->Grammar->getST();
            $this->vet = $this->Grammar->getVet();
        }

        public function getQuestion()
        {
            for($a = 0; $a <= $this->vet; $a++)
            {
                echo "
                <div class='container' id='cnt-lesson'>

                    <div class='row'>
                        <div class='h4 mt-5'>Questão ".($a+1)."</div>
                    </div>
                    <div class='row'>
                        <div class='col'>
                            ".$this->Content[$a]."
                        </div>
                    </div>

                    <div class='row'>
                ";

                for ($i = 0; $i <= $this->ST[$a]; $i++)
                {
                    echo "      
                        <div class='col-12 mb-3'>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='question".($a+1)."' id='question".($a+1)."op".($i+1)."' value='".$this->Option[$i][$a]."' required>
                                <label class='form-check-label' for='question".($a+1)."op".($i+1)."'>
                                    ".$this->AlternativeText[$i][$a]."
                                </label>
                            </div>
                        </div>
                    ";
                }

                echo "
                               <input type='hidden' name='question".($a+1)."Id' value='".$this->QuestionId[$a]."'/>
                               <input type='hidden' name='question".($a+1)."Points' value='".$this->Points[$a]."'/>
                            </div>
                            
                        </div>
                    ";
            }        
            
        }

        public function getQuestionResult()
        {
            for($a = 0; $a <= $this->vet; $a++)
            {
                $this->result = $this->Grammar->VerifyResult($_POST['question'.($a+1).'Id']);

                echo "
                <div class='container' id='cnt-lesson'>
    
                        <div class='row'>
                            <div class='h4 mt-5'>Questão ".($a+1)."</div>
                        </div>
                        <div class='row'>
                            <div class='col'>
                                ".$this->Content[$a]."
                            </div>
                        </div>

                        <div class='row'>
                    
                ";

                for ($i = 0; $i <= $this->ST[$a]; $i++)
                {
                    if ($this->Option[$i][$a]==$_POST['question'.($a+1)]) 
                    {
                        if ($this->result==$this->Option[$i][$a])
                        {
                            echo "                                                   
                                <div class='col-12 mb-3'>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='question".($a+1)."' id='question".($a+1)."op".($i+1)."' value='".$this->Option[$i][$a]."' checked>
                                        <label class='form-check-label' style='color:green;' for='question".($a+1)."op".($i+1)."'>
                                            ".$this->AlternativeText[$i][$a]."
                                        </label>
                                    </div>
                                </div>
                            ";
                        } else {
                            echo "                                                   
                                <div class='col-12 mb-3'>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='question".($a+1)."' id='question".($a+1)."op".($i+1)."' value='".$this->Option[$i][$a]."' checked>
                                        <label class='form-check-label' style='color:red;' for='question".($a+1)."op".($i+1)."'>
                                            ".$this->AlternativeText[$i][$a]."
                                        </label>
                                    </div>
                                </div>
                            ";
                        }
                    } else {

                        if ($this->result==$this->Option[$i][$a])
                        {
                            echo "                                                   
                                <div class='col-12 mb-3'>
                                    <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='question".($a+1)."' id='question".($a+1)."op".($i+1)."' value='".$this->Option[$i][$a]."' disabled>
                                        <label class='form-check-label' style='color:green;' for='question".($a+1)."op".($i+1)."'>
                                            ".$this->AlternativeText[$i][$a]."
                                        </label>
                                    </div>
                                </div>
                            ";
                        } else {
                            echo "                                                   
                                <div class='col-12 mb-3'>
                                    <div class='form-check disabled'>
                                        <input class='form-check-input' type='radio' name='question".($a+1)."' id='question".($a+1)."op".($i+1)."' value='".$this->Option[$i][$a]."' disabled>
                                        <label class='form-check-label' for='question".($a+1)."op".($i+1)."'>
                                            ".$this->AlternativeText[$i][$a]."
                                        </label>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    
                }

                echo "
                            </div>
                            
                        </div>
              
                    ";
            }        
            
        }
    }
?>