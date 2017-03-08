<?php

	$conn = mysql_connect("stewie.quincy.edu", "csc420_meglama", "mimi1379");
	if (!$conn)
	{
		die("Unable to connect to database");
	}

	$CreateTableQuery = "CREATE TABLE users(
				userID int NOT NULL AUTO_INCREMENT,
				username varchar(25), 
				password varchar(25),
				PRIMARY KEY (userID))";

	mysql_select_db("csc420_meglama", $conn);


	if (!mysql_query($CreateTableQuery, $conn))
	{
		die("Unable to create table");
	}

	$InsertUserQuery = "INSERT INTO users(username, password)
				VALUES('jiangli', 'mypassword')";
	mysql_query($InsertUserQuery, $conn);
	mysql_close($conn);
	echo "Created Table"

?>