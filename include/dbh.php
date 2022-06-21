<?php
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "lakbai";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed!/n" . mysqli_connect_error());
}
