<?php
class db
{
    private $con;
    private $host = "localhost";
    private $dbname = "lakbai";
    private $user = "root";
    private $pass = "";

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

        try {
            $this->con = new PDO($dsn, $this->user, $this->pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<script>console.log('Connection Successful!')</script>";
        } catch (PDOException $e) {
            echo "<script>console.log('Connection Error!" . $e->getMessage() . "')</script>";
        }
    }

    public function viewData()
    {
        $query = "SELECT dest_name, dest_city FROM destinations";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
