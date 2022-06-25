<?php 
    require_once('database-viewer.php');

    $db = new db();
    $id = $_POST['dest_id'];
    $data = $db->searchData($id);

    echo json_encode($data);
?>