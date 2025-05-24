<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbstudent";

$connectdb = new mysqli($servername, $username, $password, $dbname);

if($connectdb->connect_errno){
    die("Connection failed: ".$connectdb->connect_error);
}
?>