<?php

/* login php */

if(!empty($_POST))
{
	mysql_connect("localhost", "root", "") or die (mysql_error ());
	$username=$_POST["username"];
	$password=$_POST["password"];
	// Select database
	mysql_select_db("sportify") or die(mysql_error());

	foreach($_POST as $value)
	{
		$value = $cxn->real_escape_string($value);
	}

	extract($_POST);

	//username password

	$password = md5($password);

	$sql="SELECT * FROM users WHERE username = '".$username."'";

	$rs=$cxn->query($sql);
 
	if($rs === false) {
 	 trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $cxn->error, E_USER_ERROR);
 	 die();
		} 

		$rs->data_seek(0);
		
		$data = $rs->fetch_assoc();

		if($data['password'] == $password)
		{
			session_start();

			//$_SESSION['uid'] = $data['id'];
			$_SESSION['username'] = $data['username'];

			echo "Welcome ".$data['username']."!";

			header('Location: index2.html');

		}
		else
		{

			echo "damn";
		}

}

?>