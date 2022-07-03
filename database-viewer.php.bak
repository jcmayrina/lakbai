<?php
    class db {
        private $con;
        private $host = "localhost";
        private $dbname = "lakbai";
        private $user = "root";
        private $pass = "";

        public function __construct() {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

            try {
                $this->con = new PDO($dsn, $this->user, $this->pass);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "<script>console.log('Connection error!" . $e->getMessage() . "')</script>";
            }
        }

        public function viewData() {
            $query = "SELECT * FROM destinations";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function searchData($id) {
            $query = "SELECT dest_name, dest_lat, dest_long, dest_desc FROM destinations WHERE dest_id LIKE :id";
            $stmt = $this->con->prepare($query);
            $stmt->execute(["id" => "%" . $id . "%"]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }