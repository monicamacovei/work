<?php
$servername = "localhost";
$username = "root";
$password = "root";
$name = "TW";
 $conn = mysqli_connect($servername, $username, $password, $name);
if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}
