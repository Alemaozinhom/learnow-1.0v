<?php   
    require_once "connection.php";

    class Grammar
    {
        private $Resp,$Count,$PointCust,$PointGain,$Vet;
        private $id, $Title, $Content,$ST,$questionId,$ContentO= array();
        private $Option,$ContentA = array();
        private $conn;
        //=========================================
        public function __construct()
        {
            $this->conn = new dbc();          
            $this->conn->connect();
        }

        //=========ID============
        public function setID($id)
        {
            $this->id = $id;
        }
        public function getid()
        {
            return $this->id;
        }
        //=======================
        public function setResp($Resp)
        {
            $this->Resp = $Resp;
        }

        //===========Questão===============
        public function getTitle()
        {
            return $this->Title;
        }
        public function getContent()
        {
            return $this->Content;
        }
        public function getCount()
        {
            return $this->Count;
        }
        public function getPointCust()
        {
            return $this->PointCust;
        }
        public function getVet()
        {
            return $this->Vet;
        }
        public function getPointGain()
        {
            return $this->PointGain;
        }
        //=================================

        //==========Alternativas===========
        public function getContentA()
        {
            return $this->ContentA;
        }
        public function getOption()
        {
            return $this->Option;
        }
        //=================================

        //Pergunta das Alternativas========
        public function getContentO()
        {
            return $this->ContentO;
        }
        public function getQuestionId()
        {
            return $this->QuestionId;
        }
        //========Statica=Count============
        public function getST()
        {   
            $array = array(
                0  => 3,
                1  => 3,
                2  => 3);
            return $this->ST=$array;
        }

        public function ConstructQuestion()
        {   
            if($this->id){
            $where = " AND grammar.ID = $this->id";
            } else {
                $where = '';
            }

            $sql =  "SELECT 
            grammar.ID as 'id',
            grammar.TITLE as 'title',
            grammar.COST as PointCust,
            texts.TEXT as 'content' 
            FROM grammar 
            INNER JOIN texts 
            on (texts.GRAMMAR = grammar.ID) 
            WHERE 1=1 
            $where";        
            $question = $this->conn->setQuery($sql);

            $Count=0;
            foreach($question as $row)
            {
                $this->id[$Count]   = $row['id'];
                $this->Title[$Count]   = $row['title'];
                $this->Content[$Count] = $row['content'];
                $this->PointCust[$Count] = $row['PointCust'];
                $this->Count = $Count++;
            }
        }
        //=========================================================
        public function ConstructQuestionTitle()
        {
            $sql = "SELECT
                    questions.ID as 'questionId',
                    questions.TEXT as 'contentO',
                    questions.POINTS as 'points'
                    FROM grammar 
                    INNER JOIN grammar_questions 
                    ON (grammar_questions.GRAMMAR = grammar.ID) 
                    INNER JOIN questions 
                    ON (questions.ID = grammar_questions.QUESTION) 
                    WHERE grammar_questions.GRAMMAR= '$this->id' ;";

            $i=0;
            $question = $this->conn->setQuery($sql);
            foreach($question as $row)
            {
                $this->QuestionId[$i] = $row['questionId'];
                $this->ContentO[$i]   = $row['contentO'];
                $this->PointGain[$i]   = $row['points'];
                $i++ ;
            }
        }
        //=========================================================
        public function ConstructAlternative()
        {  
            $sql =  "SELECT 
                    alternatives.OPTION as 'option',
                    alternatives.TEXT as 'contentA'
                    FROM grammar 
                    INNER JOIN grammar_questions 
                    on (grammar_questions.grammar = grammar.ID) 
                    INNER JOIN questions 
                    on (questions.ID = grammar_questions.QUESTION)
                    INNER JOIN alternatives 
                    on (alternatives.QUESTION = questions.ID)
                    WHERE grammar.ID = '$this->id' 
                    ORDER BY 'questionId','option';";        

            $question = $this->conn->setQuery($sql);
            $Vet=0;
            $i=0;

            foreach($question as $row)
            {
                if($i==4){
                $Vet++;
                $i=0;
                }

                $this->Option   [$i] [$Vet] = $row['option'];
                $this->ContentA [$i] [$Vet] = $row['contentA'];
                $i++ ;
                $this->Vet=$Vet;
            }
        }
        //=========================================================
        public function VerifyResult($id)
        {
            $sql =  "SELECT 
                    alternatives.option as 'correta'
                    FROM grammar_questions 
                    INNER JOIN questions 
                    on (questions.id = grammar_questions.question) 
                    INNER JOIN alternatives 
                    on (alternatives.question = questions.ID) 
                    WHERE questions.id='$id' 
                    and alternatives.correct=1
                    ORDER BY option";

            $question = $this->conn->setQuery($sql);

            foreach($question as $row)
            {
                return $row['correta'];
            }    

        }
        //=========================================================
        public function ConstructMenuButton($GrammarID)
        {   
            if($_SESSION['ID']){
            $where = " WHERE profiles_grammar.profile = ".$_SESSION['ID']." ";
            } else {$where = '';}

            if($GrammarID){
            $and = " AND profiles_grammar.grammar = ".$GrammarID." ";
            } else {$and = '';}

            $sql = "SELECT 
            profiles_grammar.status AS STT 
            FROM profiles_grammar 
            ".$where." ".$and." ";
            $question = $this->conn->setQuery($sql);
            foreach($question as $row)
            {
                if($row['STT']==1){
                return '1';
                }
                if($row['STT']==0){
                return '0';
                }
            } 
            return '2';
        }
        //=========================================================
    }
?>