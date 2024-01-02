<?php 

    $db_Server = "localhost";
    $db_Username = "root";
    $db_Name = "bibi";
    $db_Password = "";

    $db_Connection = mysqli_connect($db_Server, $db_Username, $db_Name, $db_Password);

    if (!$db_Connection) {
       die("CONNECTION TO DATABASE FAILED! ". mysqli_connect_error());
    }

    // STARTING A SESSION
    session_start();
?>