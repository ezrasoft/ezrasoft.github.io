<?php
    include 'db_connection.php';

    $pname = $_POST['pname'];
    $pdescription = $_POST['pdescription'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "INSERT INTO projects (pname, pdescription, start_date, end_date) VALUES ('$pname', '$pdescription', '$start_date', '$end_date')";
    $database->exec($query);
?>
