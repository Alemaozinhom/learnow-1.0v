<?php
    session_start();
    class dbc
    {
        private $conn;

        public function getConn()
        {
            return $this->conn;
        }
        
        public function connect()
        {
            $host     = "localhost";
            $username = "root";
            $passwd   = null;
            $dbname   = "learnow";

            $this->conn = new mysqli($host,$username,$passwd,$dbname);
            
            if ($this->conn->connect_error) 
            {
                die("Connection Falhou: " . $this->conn->connect_error);
            }
        }

        public function setQuery($sql)
        {            
            $result = $this->conn->query($sql);
                
            if (empty($this->conn->error))
            {
                return $result;
            } else {
                die("Querry Falhou: " . $this->conn->error);
            }         
        }

        public function closeConn()
        {
            $this->conn->close;
        }       
    }
?>