 <?php  
// Connect to the file above here  
require "connect_to_mysql.php"; 

//Create admin table on mySql db
$sqlCommand = "CREATE TABLE admin (
		id int(11)NOT NULL auto_increment,
		username varchar(20) NOT NULL,
		password varchar(20) NOT NULL,
		last_log_date date NOT NULL,
		PRIMARY KEY (id),
		UNIQUE KEY username (username)
		)";
if(mysql_query($sqlCommand)){
	echo "Admin table has been created successfully.";
} else {
	echo "CRITICAL ERROR. Table not created.";
}
?>
