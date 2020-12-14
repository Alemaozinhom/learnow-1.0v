<?php   
    require_once "connection.php";
    class User
    {
        private $ID, $email, $password, $username, $points;
        private $levels = array();
        private $conn;

        public function __construct()
        {
            $this->conn = new dbc();          
            $this->conn->connect();
        }
        
        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function auth($type)
        {
            // ---- Busca no banco com as informações passadas ----
            if ($type==1) {
                $sql =  "SELECT ID FROM USERS WHERE EMAIL = '$this->email' AND PASSWORD = '$this->password';";  
            } else {
                $sql =  "SELECT ID FROM USERS WHERE EMAIL = '$this->email';";  
            }
                  
            $result = $this->conn->setQuery($sql);

            foreach($result as $row)
            {
                $this->ID = $row['ID'];
            }

            // Auth para identidicar se o User com as credenciais existe
            if (!empty($this->ID)) 
            {
                return $this->ID;
            }

            return null;
        }

        public function loadProfile()
        {
            // ---- Load das informações do perfil do User ----
            $sql =  "SELECT * FROM PROFILES WHERE USER = '$this->ID';";
            $result = $this->conn->setQuery($sql);

            foreach($result as $row)
            {
                $ProfileID = $row['ID'];
                $this->username = $row['USERNAME'];
                $this->points = $row['POINTS'];
            }
            $User = New User();
            // ---- Load dos IDs dos leveis que o User possui ----
            /*$sql =  "SELECT LEVEL FROM PROFILES_LEVELS WHERE PROFILE = '$ProfileID';";
            $result = $this->conn->setQuery($sql);

            // Foreach para colocar cada ID dos leveis no array da classe
            $i = 0;
            foreach($result as $row)
            {
                $this->leveis[$i] = $row['LEVEL'];
                $i++;
            }*/

            // Criando as variaveis para sessão
            $_SESSION['ID'] = $this->ID;
            $_SESSION['LOGIN'] = true;
            $_SESSION['USERNAME'] = $this->username;
            $_SESSION['EMAIL'] = $this->email;
            //$_SESSION['LEVEIS'] = $this->levels;
        }

        public function createProfile()
        {
            // ---- Insersão dos dados para criação do User ----
            $sql = "INSERT INTO USERS(EMAIL,PASSWORD) VALUES('$this->email','$this->password');";
            $this->conn->setQuery($sql);

            // ---- Insersõa dos dados para criação da profile ----

            // Busca do ID do User
            $sql =  "SELECT ID FROM USERS WHERE EMAIL = '$this->email';";        
            $result = $this->conn->setQuery($sql);

            foreach($result as $row)
            {
                $this->ID = $row['ID'];
            }

            // Pontos padrão
            $this->points = 150;

            $sql = "INSERT INTO PROFILES(USERNAME,POINTS,USER) VALUES('$this->username','$this->points','$this->ID');";
            $this->conn->setQuery($sql);
        }

        public function updateProfile()
        {
            // ---- Update User ----
            $sql = "UPDATE USERS SET EMAIL = '$this->email', PASSWORD = '$this->password' WHERE ID = $this->ID;";
            $this->conn->setQuery($sql);
        }

        public function checkedGrammar($grammar)
        {
            $User = $_SESSION['ID'];
            $sql = "UPDATE 
            PROFILES_GRAMMAR
            INNER JOIN PROFILES
            ON (PROFILES.ID = PROFILES_GRAMMAR.PROFILE)
            INNER JOIN GRAMMAR
            ON (GRAMMAR.ID = PROFILES_GRAMMAR.GRAMMAR)
            SET PROFILES_GRAMMAR.STATUS = '1' 
            WHERE PROFILES.USER = $User 
            AND GRAMMAR.ID = $grammar;";
            $this->conn->setQuery($sql);
        }

        public function checkedComprehension($comprehension)
        {
            $User = $_SESSION['ID'];
            $sql = "UPDATE 
            PROFILES_COMPREHENSION 
            INNER JOIN PROFILES
            ON (PROFILES.ID = PROFILES_COMPREHENSION.PROFILE)
            INNER JOIN COMPREHENSION 
            ON (COMPREHENSION .ID = PROFILES_COMPREHENSION .COMPREHENSION )
            SET PROFILES_COMPREHENSION.STATUS = '1'  
            WHERE PROFILES.USER = $User
            AND COMPREHENSION.ID = $comprehension;";
            $this->conn->setQuery($sql);
        }
        
        public function actualyPoints($id){
            $sql =  "SELECT 
            profiles.POINTS as pointsA
            FROM profiles 
            INNER JOIN users 
            ON (users.ID = profiles.USER) 
            WHERE users.ID = '$id';";
            $list = $this->conn->setQuery($sql);
            
            foreach($list as $row){
                $pointsA = $row['pointsA'];
            }
            return $pointsA;
        }

        public function updatePoints($id,$points)
        {   
            $User = New User();
            $pointsA=$User->actualyPoints($id);
            
            $sql = "UPDATE
            profiles SET points = ('$pointsA'+'$points') 
            WHERE USER = '$id';";
            return $this->conn->setQuery($sql);
            
        }
        
        public function removePoints($id,$points)
        {   
            $User = New User();
            $pointsA=$User->actualyPoints($id);

            if(($pointsA - $points) < 0){
                return false;
            }
            
            $sql = "UPDATE
            profiles SET points = ('$pointsA'-'$points') 
            WHERE USER = '$id';";
            $this->conn->setQuery($sql);
            return true;
            
        }

        public function deleteProfile()
        {
            // ---- Delete User (CASCADE MODE) ----
            $sql = "DELETE FROM USERS WHERE ID = $this->ID;";
            $this->conn->setQuery($sql);  
        }

        public function TextBtn($STT)
        {
            switch ($STT) {
                case 0:
                    return "Iniciar Aula";
                    break;
                case 1:
                    return "Revisar Aula";
                    break;
            }
            return 'Comprar Aula';
        }

        public function createGramProf($prof,$gram)
        {
            $sql="INSERT INTO profiles_grammar (PROFILE,GRAMMAR) values ($prof,$gram)";
            $this->conn->setQuery($sql);  
        }

        public function createCompProf($prof,$comp)
        {
            $sql="INSERT INTO profiles_comprehension (PROFILE,COMPREHENSION) values ($prof,$comp)";
            $this->conn->setQuery($sql);  
        }
    } 
?>