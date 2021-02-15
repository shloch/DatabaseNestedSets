<?php
    class Database {
        //DB params
        private $host = '127.0.0.1';
        private $db_name = 'nested_sets';
        private $username = 'root';
        private $password = 'root';
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
