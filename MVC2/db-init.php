<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = "An2019";
 $conn = mysqli_connect($servername, $username, $password, $name);
if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}
