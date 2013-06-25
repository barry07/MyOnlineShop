<?php 
session_start();
if(isset($_SESSION["manager"])){
	header("location:index.php");
	exit();
}
?>
<?php 
//parse the log in form if the user has filles it out and pressed 'Log In'
if(isset($_POST["username"])&& isset($_POST["password"])){
	$manager = preg_replace('#(^A-Za-z0-9)#i','',$_SESSION["manager"]); //filter everything out except numbers and letters
	$password = preg_replace('#(^A-Za-z0-9)#i', '', $_SESSION["password"]); //filter everything out except numbers and letters
	//connect to mySQl db
	include 'storescripts/connect_to_mysql.php';
	$sql = mysql_query("SELECT  id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1");
	//MAKE SURE person exists on db
	$existCount = mysql_num_rows($sql); //count num of rows
	if($existCount == 1){
		while ($row = mysql_fetch_array($sql)){
			$id = $row["id"];
		}
		$_SESSION["id"]=$id;
		$_SESSION["manager"]=$manager;
		$_SESSION["password"]=$password;
		header("location:index.php");
		exit();
	}else {
		echo 'That information is incorrect, please try again. <a href="index.php">Click here</a>';
		exit(); 
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
        <link rel='stylesheet' type='text/css' href='style/style.css'/>
        <script type='text/javascript' src='script.js'></script>
	</head>
	<body>
	<div align="center" id="mainWrapper">
	<?php include_once('template_header.php');?>
		<div id="pageContent"></div><br />
		 <div align="left" style="margin-left: 24px;">
		  <h2>Please Log In To Manage the Store</h2>
		  <form id="form1" name="form1" method="post" action="admin_login.php">
		  User Name:<br />
		   <input name="username" type="text" id="username" size="40" />
		   <br /><br />
		   Password:<br />
		   <input name="password" type="password" id="password" size="40">
		   <br />
		   <br />
		   <br />
		   <label>
		    <input type="submit" name="button" id="button" value="Log In" /> 
		   </label>
		   </form>
		   <p>&nbsp; </p>
		   </div>
	<?php include_once('template_footer.php');?>
	</div>
	</body>
</html>
