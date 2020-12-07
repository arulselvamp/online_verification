<?php
session_start();
$host="localhost";
$username="root";
$pass="";
$db="cert_ver";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}


?>