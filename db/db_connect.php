<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'phone_number';

$conn = mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn){
	die('Database Not Connected :'.mysqli_connect_error());
}
?>