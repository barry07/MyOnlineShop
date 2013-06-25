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
