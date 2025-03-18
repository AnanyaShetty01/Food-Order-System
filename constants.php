<?php  
    //Start Session
    session_start();

    //Create Contsants to store Non Repeating values
    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    
 
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, '', 3307) or die(mysqli_connect_error()); // Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); // Selecting Database

?>