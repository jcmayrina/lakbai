<?php
class admin
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

    public function viewUsers()
    {
        $query = "SELECT * FROM `users` WHERE `user_lvl` = 2;";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function viewTours()
    {
        $query = "SELECT * FROM `destinations`;";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function viewReviews()
    {
        if (isset($_SESSION['userID'])) {
            $id = $_SESSION['userID'];
            $query = "SELECT
        destinations.dest_name, destinations.dest_city, destinations.dest_desc, destinations.dest_image, reviews.review_comment, reviews.review_star
        FROM reviews
        JOIN users 
        ON reviews.review_userID = users.user_id
        JOIN destinations 
        ON reviews.review_destID = destinations.dest_id
        WHERE users.user_id = $id;";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function editTour()
    {

        if (isset($_GET['edittour'])) {
            $id = $_GET['edittour'];

            $query = "SELECT * FROM `destinations` WHERE `dest_id` = $id;";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function showcurrUser()
    {

        if (isset($_SESSION['userID'])) {
            $id = $_SESSION['userID'];

            $query = "SELECT * FROM `users` WHERE `user_id` = $id;";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
