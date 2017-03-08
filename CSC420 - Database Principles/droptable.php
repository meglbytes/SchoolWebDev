<?php

	$conn = mysql_connect("stewie.quincy.edu", "csc420_meglama", "mimi1379");
	if (!$conn)
	{
		die("Unable to connect to database");
	}

	mysql_select_db("csc420_meglama", $conn);

	$DropQuery = "DROP TABLE users";
	mysql_query($DropQuery, $conn);
	mysql_close($conn);
	echo "Dropped Table"

?>