<?php

//open connection to DB
// $conn=  mysqli_connect("server" , "username","password" , "database name");
$conn=  mysqli_connect("localhost","root","","ekids");
if (!$conn) {
die("cannot connect to server");
}

?>