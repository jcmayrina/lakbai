<?php 
    require_once('database-viewer.php');

    $db = new db();
    $city = $_POST['dest_city'];
    $tag = $_POST['dest_tags'];
    $data = $db->searchRelatedCity($city, $tag);

    echo json_encode($data);
?>