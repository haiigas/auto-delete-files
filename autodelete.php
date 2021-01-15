<?php
    /**
     * using mysqli_connect for database connection
     */

    $databaseHost = 'localhost';
    $databaseName = 'databasename';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT * FROM table_name");

    while($file = mysqli_fetch_array($result)) {  

        $timestamp = strtotime($file['created_at']);

        $tahun = date('Y', $timestamp);
        $bulan = date('m', $timestamp);

        $selisih = (date('m') - $bulan);
        $berapa = 2;

        if (($tahun == date('Y') && $selisih >= $berapa) || ($tahun < date('Y'))) {
            if (file_exists('./assets/upload/'.$file['file_name'])) {
                unlink('./assets/upload/'.$file['file_name']);
            }
        }
    }
?>
