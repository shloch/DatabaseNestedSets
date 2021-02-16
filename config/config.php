<?php
    class Database {
        //DB params
        private $host = 'r6ze0q02l4me77k3.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
        private $db_name = 'zhh9egv99fqz4tdr';
        private $username = 'iwcr197sew9tozkz';
        private $password = 'xa9h0q4mm3qtxovh';
        private $connection;

        // DB Connect
        public function connect() {
            $this->connection = null;

            try { 
                $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }

            return $this->connection;
        }
    }
