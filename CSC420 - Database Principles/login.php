<?php
	session_start();
?>

<html>
<head><title>Login Page</title>
<body>

	<?php

	//Example Log-in Script

		if (! (isset($_POST["SubmitButton"])))
		{
	
		echo '<h3>Login Please</h3>';
		echo '<form ACTION="login.php" METHOD="post">';
		echo '	Username: <INPUT TYPE="text" NAME="username"><br />';
		echo '	Password: <INPUT TYPE="password" NAME="password"><br />';
		echo '	<INPUT TYPE="submit" NAME="SubmitButton" VALUE="Login">';
		echo '</form>';

	
		}
		else
		{

			//First, let's validate their input
			//preg_match("{\\w\\d}\\+", $_POST["username"], $matches);
			//$username = $matches[0];	//The first spot in $matches will contain the string that matched the entire pattern
			//preg_match("{\\w\\d}\\+", $_POST["password"], $matches);
			//$password = $matches[0];

			$username = $_POST["username"];
			$password = $_POST["password"];

			$conn = mysql_connect("stewie.quincy.edu", "csc420_meglama", "mimi1379");

			if (!$conn)
			{
				die("Unable to open database");
			}

			mysql_select_db("csc420_meglama", $conn);

			$LoginQuery = "SELECT UserID FROM users WHERE username = '" . $username . "' AND ";
			$LoginQuery = $LoginQuery . " password='" . $password ."';";

			echo $LoginQuery;

			
			$result = mysql_query($LoginQuery, $conn);
			if (mysql_num_rows($result) == 0)
			{
				die("Blah!");
			}

			$_SESSION["username"] = $username;
			//echo $_SESSION["username"];
			echo "<meta http-equiv='refresh' content='0;url=home.php'>";
		}
	?>


</body>
</html>