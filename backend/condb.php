<?php
$db_name = "tinbao";
$db_password = "root";
$db_username = "root";
$db_host = "localhost";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if(!$conn){
    die("Database connect failed: ". mysqli_connect_error());
}