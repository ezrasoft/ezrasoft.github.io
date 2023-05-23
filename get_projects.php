<?php
    include 'db_connection.php';

    $query = 'SELECT * FROM projects';
    $result = $database->query($query);

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<div>';
        echo '<h3>'.$row['pname'].'</h3>';
        echo '<p>Description: '.$row['pdescription'].'</p>';
        echo '<p>Start Date: '.$row['start_date'].'</p>';
        echo '<p>End Date: '.$row['end_date'].'</p>';
        echo '<button onclick="deleteProject('.$row['pid'].')">Delete</button>';
        echo '</div>';
        echo '<hr>';
    }
?>
