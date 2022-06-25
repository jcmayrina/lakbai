<?php
session_start();
require_once './include/dbh.php';

$stmt = "SELECT * FROM `destinations`WHERE `dest_name` like '%" . $_POST['name'] . "%' OR `dest_city` like '%" . $_POST['name'] . "%';";
$array = $conn->query($stmt);

foreach ($array as $i) {
?>
    <div id="user" onclick=""><img src="<?php echo "images/lakbai-places/" . $i['dest_image'] ?>" id='pic' alt=""><span><?php echo $i['dest_name']; ?></span></div>

<?php
}
?>