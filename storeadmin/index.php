<?php 
session_start();
if(!isset($_SESSION["manager"])){
	header("location:admin_login.php");
	exit();
}
//be sure to check that this manager SESSION value is in the db
$managerID = preg_replace('#(^0-9)#i', '',$_SESSION["id"]); //filter everything out except numbers and letters
$manager = preg_replace('#(^A-Za-z0-9)#i','',$_SESSION["manager"]); //filter everything out except numbers and letters
$password = preg_replace('#(^A-Za-z0-9)#i', '', $_SESSION["password"]); //filter everything out except numbers and letters

//run mySQL query to make sure that this person is an admin
//connect to mySQl db
include "storescripts/connect_to_mysql.php";
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");
// MAKE SURE PERSON EXISTS IN db
$existCount = mysql_num_rows($sql); //count num of rows
if($existCount == 0){
	header("location:../index.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Store Admin Area</title>
        <link rel='stylesheet' type='text/css' href='../style/style.css'/>
	</head>
	<body>
	<div align="center" id="mainWrapper">
	<?php include_once('../template_header.php');?>
		<div id="pageContent"></div><br/>
		ADMIN AREA INDEX PAGE<br/>
		<div align="left" ></div>
		<br/>
		<br/>
	<?php include_once('../template_footer.php');?>
	</div>
	</body>
</html>