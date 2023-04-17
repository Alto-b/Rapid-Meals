<?php
$serverName="localhost";
$user="root";
$password="";
$Database="db_rapidmeals";
$con=mysqli_connect($serverName,$user,$password,$Database);
if(!$con)
{
	echo"Database connection Error";	
}
?>