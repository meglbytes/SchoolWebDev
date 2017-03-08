<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/jpg" href="favicon.jpg"/>
<title>LRC Login</title>
<style type="text/css">

</style></head>

<body>

<div class="container">
  <div class="header">
    <h1><img src="hawk_logo.jpg" width="150" />	LRC Tutor Login</h1>
      <!-- end .header -->
  </div>
  <div class="content">
  <h4>Welcome to the Quincy University Learning Resource Center tutor scheduling page.</h4>
  <p>Please Login with the username and password that you have been provided.</p>
    <form id="login_form" name="login_form" method="post">
      <table>
      <tr>
      <td>
      <h3>
        <label for="username">Username</label>
      </h3>
      </td>
      <td>
      <h3>
        <input type="text" name="username" id="username" />
      </h3>
      </td>
      </tr>
      <tr>
      <td>
      <h3>
        <label for="password">Password</label>
      </h3>
      </td>
      <td>
      <h3>
        <input type="password" name="password" id="password" />
      </h3>
      </td>
      </tr>
      </table>
      <p>
        <input type="submit" name="login" id="login" value="Login" />
      </p>
    </form>
<?php
	if (isset($_POST["login"]))
		{
		$username = $_POST["username"];
		$password = $_POST["password"];

		$conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");
		if (!conn)
			{
			die("Unable to open database");
			}
		mysql_select_db("LRC_MySQL", $conn);
		$LoginQuery = "SELECT ID FROM TutorLogin WHERE username = '$username' AND password = '$password';";

		$result = mysql_query($LoginQuery, $conn);
		while ($row = mysql_fetch_array($result))
				{
				$_SESSION["ID"] = $row["ID"];
				}
		$count = mysql_num_rows($result);
		if($count==1)
			{
			$_SESSION["username"] = $username;
			
			if ($_SESSION["ID"] == 1)
				{
				echo "<meta http-equiv='refresh' content='0;url=admin_about.php'>";
				}
			else
				{
				echo "<meta http-equiv='refresh' content='0;url=tutor_page.php'>";
				}
			}
		else
			{
			echo '<span style="color: red;">Invalid Username or Password!</span>';
			}
		}


    <!-- end .content -->
  </div>
  <div class="footer">
       <p>&copy;2013 Quincy University Learning Resource Center</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
