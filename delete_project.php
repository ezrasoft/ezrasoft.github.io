<?php
    include 'db_connection.php';

    $pid = $_POST['pid'];

    $query = "DELETE FROM projects WHERE pid = $pid";
    $database->exec($query);
?>
