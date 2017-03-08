<?php

	session_start();

	//If there is no active session (i.e. the user hasn't logged in, send them to the
	//login screen.
	If (!isset($_SESSION["username"]))
	{
		header("Location:login.php");
	}
?>

<html>
<head><title>Account Home</title></head>
<body>

<?php
	echo "<h3>Account Homepage For " . $_SESSION["username"] . "</h3>";
	echo "<br />";
	echo "<h4>Menu:</h4><br />";
	echo "<ul>";
	echo "<li><a href='addclasses.php'>Add Classes</a><br />";
	echo "<li><a href='dropclasses.php'>Drop Classes</a><br />";
	echo "<li><a href='paybill.php'>Pay Bill</a><br />";
	echo "</ul>";
?>

</body>
</html>
	