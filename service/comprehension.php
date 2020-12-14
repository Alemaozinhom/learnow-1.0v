<?php   
    require_once "connection.php";

    class Comprehension
    {
        private $Resp,$Count,$ContentO,$PointCust,$PointGain;
        private $id, $Title, $Content = array();
        private $Option,$ContentA = array();
        private $conn;

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
        //=================================
        public function ConstructQuestion()
        {   
            if($this->id){
            $where = " AND comprehension.ID = $this->id";
            } else {
                $where = '';
            }

            $sql =  "SELECT 
            comprehension.ID as 'id',
            comprehension.TITLE as 'title',
            comprehension.COST as PointCust,
            audios.TEXT as 'content' 
            FROM comprehension 
            INNER JOIN audios 
            on (audios.Comprehension = comprehension.ID) 
            WHERE 1=1 
            $where";        
            $question = $this->conn->setQuery($sql);

            $Count=0;
            foreach($question as $row)
            {
                $this->id[$Count]   = $row['id'];
                $this->Title[$Count]   = "<div id='vTitle'>".$row['title']."</div>";
                $this->Content[$Count] = "<div id='vContent'>".$row['content']."</div>";
                $this->PointCust[$Count] = $row['PointCust'];
                $this->Count = $Count++;
            }
        }
        public function ConstructQuestionTitle()
        {
            $sql = "SELECT
            questions.TEXT as 'contentO'
            FROM comprehension_questions 
            INNER JOIN questions 
            ON (questions.ID = comprehension_questions.QUESTION) 
            WHERE comprehension_questions.Comprehension= '$this->id' ;";
            $question = $this->conn->setQuery($sql);
            foreach($question as $row)
            {
                $this->ContentO= "<div class=vContentO>".$row['contentO']."</div>";
            }
        }
        public function ConstructAlternative()
        {  
            $sql =  "SELECT 
            alternatives.OPTION as 'option',
            alternatives.TEXT as 'contentA'
            FROM comprehension_questions 
            INNER JOIN questions 
            on (questions.ID = comprehension_questions.QUESTION) 
            INNER JOIN alternatives 
            on (alternatives.QUESTION = comprehension_questions.QUESTION)
            WHERE questions.ID = '$this->id' 
            ORDER BY option;";        
            $question = $this->conn->setQuery($sql);

            $i = 0;
            $Count=0;
            foreach($question as $row)
            {
                $this->Option[$i] = $row['option'];
                $this->ContentA[$i] = "<div class=vContentA>".$row['option']." - ".$row['contentA']."</div>";
                $this->Count = $Count++;
                $i++;
            }
        }
        public function VerifyResult()
        {
            $sql =  "SELECT 
            alternatives.correct as 'correta'
            FROM comprehension_questions 
            INNER JOIN questions 
            on (questions.id = comprehension_questions.question) 
            INNER JOIN alternatives 
            on (alternatives.question = questions.ID) 
            WHERE questions.id='$this->ID' 
            and alternatives.option='$this->Resp' 
            ORDER BY option";
            $question = $this->conn->setQuery($sql);

            foreach($question as $row)
            {
                if($row['correta']=1){
                    echo 'correta';
                }else{
                    echo 'errada';
                }
            }    

        }
        public function ConstructMenuButton($comprehensionID)
        {   
            if($_SESSION['ID']){
            $where = " WHERE profiles_comprehension.profile = ".$_SESSION['ID']." ";
            } else {$where = '';}

            if($comprehensionID){
            $and = " AND profiles_comprehension.comprehension = ".$comprehensionID." ";
            } else {$and = '';}

            $sql = "SELECT 
            profiles_comprehension.status AS STT 
            FROM profiles_comprehension 
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
    }
?>