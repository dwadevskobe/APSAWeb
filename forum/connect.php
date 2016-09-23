<?php
//connect.php
$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'db1';
$connect = mysqli_connect($server, $username,  $password, $database);
 
if(!$connect)
{
    exit('Error: could not establish database connection');
}


?>