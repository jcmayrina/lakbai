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
        } catch (PDOException $e) {
            echo "<script>console.log('Connection error!" . $e->getMessage() . "')</script>";
        }
    }

    /* READY QUERIES */

    public function viewDestinationData()
    {
        $query = "SELECT DISTINCT dest_city FROM destinations ORDER BY dest_city ASC";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /* FOR GETTING QUERIES */

    //Get entire table in destinations
    public function viewData()
    {
        $query = "SELECT * FROM destinations";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Get entire row using id
    public function searchData($id)
    {
        $query = "SELECT * FROM destinations WHERE dest_id LIKE :id";
        $stmt = $this->con->prepare($query);
        $stmt->execute(["id" => "%" . $id . "%"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchRelatedCity($input, $tag)
    {
        $query = "SELECT * FROM destinations WHERE (dest_add LIKE :input OR dest_name LIKE :input) AND dest_tags LIKE :tag";
        $stmt = $this->con->prepare($query);
        $stmt->execute(array(
            'input' => '%' . $input . '%',
            'tag' => '%' . $tag . '%'
        ));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
