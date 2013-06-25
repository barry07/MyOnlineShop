 <?php  
// Connect to the file above here  
require "connect_to_mysql.php"; 

//Create products table on mySql db
$sqlCommand = "CREATE TABLE products (
		id int(11)NOT NULL auto_increment,
		product_name varchar(255) NOT NULL,
		price varchar(16) NOT NULL,
		details text NOT NULL,
		category varchar(16) NOT NULL,
		subcategory varchar(16) NOT NULL,
		date_added date NOT NULL,
		PRIMARY KEY (id),
		UNIQUE KEY username (product_name)
		)";
if(mysql_query($sqlCommand)){
	echo "Products table has been created successfully.";
} else {
	echo "CRITICAL ERROR. Table not created.";
}
?>
