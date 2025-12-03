<?php
    /**
     * using mysqli_connect for database connection
     */

    $dbhost = 'localhost';
    $dbname = 'database';
    $dbuser = 'root';
    $dbpassword = '';

    $mysqli = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname); 

    // Fetch all data from table
    $result = mysqli_query($mysqli, "SELECT * FROM table");

    while($file = mysqli_fetch_array($result))
    {
        $timestamp = strtotime($file['created_at']);
        $year = date('Y', $timestamp);
        $month = date('m', $timestamp);
        $diff = (date('m') - $month);
        $period = 2;

        if (($year == date('Y') && $diff >= $period) || ($year < date('Y'))) {
            if (file_exists('./assets/upload/'.$file['file_name'])) {
                unlink('./assets/upload/'.$file['file_name']);
            }
        }
    }
?>
