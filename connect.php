<?php

$db_name="sportify";
$username="root";
$password="";
$host="localhost";
$tb_name="user";
mysql_connect($host,$username,$password);
mysql_select_db($db_name);

$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

$sql="INSERT INTO $tb_name (email,username,password) VALUES ('".$email."', '".$username."','".$password."')";
$result=mysql_query($sql);

if($result){
	header('Location: login.php');
}
?>
