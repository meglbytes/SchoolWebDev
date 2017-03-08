<?php
	session_start();

	if (!(isset($_SESSION["username"])) || $_SESSION["username"]!= 'tutor')
		{
			header("Location: index.php");
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/jpg" href="favicon.jpg"/>
<title>LRC Tutor Information Page</title>
<style type="text/css">

</style>
<script type="text/javascript">
function error_check()
	{
	var firstname = document.getElementById("firstname");
	var lastname = document.getElementById("lastname");
	var age = document.getElementById("age");

	if(firstname.value =="")
		{
		alert("Please enter your first name.");
		return false;
		}
	else if(lastname.value =="")
		{
		alert("Please enter your last name.");
		return false;
		}
	else if(age.value == 0)
		{
		alert("Please enter your class.");
		return false;
		}
	return true;
	}

</script>
</head>
<body>

<div class="container">
  <div class="header">
    <h1><img src="hawk_logo.jpg" width="150" /> LRC Tutor Information Page</h1>
      <!-- end .header -->
  </div>
  <div class="content">
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return error_check()">
      <div>
	<p><strong>First Name 
        <input type="text" name="firstname" id="firstname" />
      </strong></p>
	<p><strong>Last Name
        <input type="text" name="lastname" id="lastname" />
      </strong></p>
      <p><strong>Class</strong>
        <select name="age" id="age">
	  <option value=0>Select</option>
          <option value=1>Freshman</option>
          <option value=2>Sophmore</option>
          <option value=3>Junior</option>
          <option value=4>Senior</option>
        </select>
      </p>
      <br/></div>

      <p><strong><u>Select your available hours below</u></strong> (*4:00 PM is an hour block from 4:00 PM to 5:00 PM)</p>
      <div style="width:14%; float:left">
        <p><strong>Monday</strong></p>
      <p>
  <label>
    <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT mon_open, mon_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["mon_open"];
	$tc = $row["mon_close"];
	$tg = $to;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
        <br />
      </p>
    </div>
     <div style="width:14%; float:left">
      <p><strong>Tuesday</strong></p>
      <p>
        <label>
          <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT tues_open, tues_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["tues_open"];
	$tc = $row["tues_close"];
	$tg = $to + 24;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
  
</p>
      </div>
      <div style="width:14%; float:left">
        <p><strong>Wednesday</strong></p>
        <p>
          <label>
          <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT wed_open, wed_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["wed_open"];
	$tc = $row["wed_close"];
        $tg = $to + 48;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
    </p>
      </div>
      <div style="width:14%; float:left">
      <p><strong>Thursday</strong></p>
      <p>
        <label>
         <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT thurs_open, thurs_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["thurs_open"];
	$tc = $row["thurs_close"];
        $tg = $to + 72;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
        <br />
      </p>
      </div>
      <div style="width:14%; float:left">
      <p><strong>Friday</strong></p>
      <p>
        <label>
         <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT fri_open, fri_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["fri_open"];
	$tc = $row["fri_close"];
        $tg = $to + 96;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
      </p>
      </div>
<div style="width:14%; float:left">
      <p><strong>Saturday</strong></p>
      <p>
        <label>
         <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT sat_open, sat_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["sat_open"];
	$tc = $row["sat_close"];
	$tg = $to + 120;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
      </p>
      </div>
<div style="width:14%; float:left">
      <p><strong>Sunday</strong></p>
      <p>
        <label>
         <?php
        
        $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");  
	mysql_select_db("LRC_MySQL", $conn);
                          
        $HoursQuery = "SELECT sun_open, sun_close FROM Admin_Options;";      
	
	$result = mysql_query($HoursQuery, $conn);
        
	if(mysql_num_rows($result) == 0)
          die("Doesn't work");
	$row = mysql_fetch_array($result);
        $to = $row["sun_open"];
	$tc = $row["sun_close"];
        $tg = $to + 144;
        if($to == -1 || $tc == -1)
          echo '<h3>No Hours Available</h3>';
        else
          for($to; $to<=$tc; $to++)
          {  
	    $tg++;
            echo '<label>';      
            echo '<input type="checkbox" name="' . $tg . '" value="yes" id="' . $tg . '" />';
	    if($to < 12)
              echo $to .':00 AM</label>';
	    else if($to == 12)
	      echo '12:00 PM';
	    else
	    {
	      $temp = $to;
	      $temp = $temp - 12;
              echo $temp .':00 PM';
	    }
            echo '<br />';
          }

          ?>
      </p>
      </div>
      
	  <table width=100%>
      <tr>
      <td>&nbsp;</td>
      </tr>
      </table>
      
      <p><strong><u>Number of Total Hours</u></strong>*      
        <?php
          echo '<select name="num_hours">';
        
          $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");
          mysql_select_db("LRC_MySQL", $conn);
          $HoursQuery = "SELECT min_hours, max_hours FROM Admin_Options WHERE ID = 1;";
	  $result = mysql_query($HoursQuery, $conn);
	  $row = mysql_fetch_array($result);
	  $max = $row["max_hours"];
	  $min = $row["min_hours"];

	  for($min; $min<=$max; $min++)
	  {
 	    echo '<option value="' . $min . '">' . $min . '</option>';
          }
          echo '</select>'
        ?>

      </p>
      <p><font size ="2">*Maximum and minimum number of hours are decided by the LRC Coordinator.</font></p>
      <p><strong><u>Select Department(s)</u></strong></p>
      <font size ="2" style="padding-left:15px">*Select "Multiple Subjects" if you plan on tutoring for more than one.</font>
      <br />
	<div style="padding-left:15px;">
	<select name="department" id="department">
	  <option value="Multiple Subjects">Multiple Subjects</option>	
          <option value="Accounting">Accounting</option>
          <option value="Anatomy & Physiology">Anatomy & Physiology</option>
          <option value="Biology">Biology</option>
          <option value="Business">Business</option>
          <option value="Chemistry">Chemistry</option>
          <option value="Communications">Communications</option>
          <option value="Computer Science">Computer Science</option>
          <option value="Criminal Justice">Criminal Justice</option>
          <option value="Education">Education</option>
          <option value="English">English</option>
          <option value="French">French</option>
          <option value="History">History</option>
          <option value="Mathematics">Mathematics</option>
          <option value="Music">Music</option>
          <option value="Philosophy">Philosophy</option>
          <option value="Physical Science">Physical Science</option>
	  <option value="Physics">Physics</option>
          <option value="Political Science">Political Science</option>
          <option value="Psychology">Psychology</option>
          <option value="Spanish">Spanish</option>
	  <option value="Theology">Theology</option>	
        </select></div>
	<p>&nbsp;</p>
	  <p><strong><u>Writing Lab?</u></strong>
	    <input type="radio" name="radio" id="Writing_Lab" value="1" />
      	<label for="Writing_Lab">Yes</label>
   	    <input type="radio" name="radio" id="Writing_Lab" value="2" checked/>
   	    <label for="Writing_Lab">No</label>
	  </p>
	  <p>
		  <input type="submit" name="submit_button" id="submit_button" value="Submit" />
	  </p>
		  <!-- end .content -->
    </form>
<?php
	//Algo to collect hours into one string
	
	if (isset($_POST["submit_button"]))
 	{		 
		$hour_str = "";
		$hours_count = -1;
		for($n = 0; $n < 168; $n++) 
		{
			$hours_count++;
			if ($_POST[$n] == 'yes')
			{

				if($hour_str == "")
					{$hour_str = $hours_count;}
				else
					{$hour_str = $hour_str . ", " . $hours_count;}
			}
		
		}
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$class=$_POST["age"];
		$num_hours=$_POST["num_hours"];
		$dept=$_POST["department"];
		$writing_lab=$_POST["radio"];
		
		$conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");
		if (!conn)
			{
			die("Unable to open database");
			}
		mysql_select_db("LRC_MySQL", $conn);
		$CreateQuery = "INSERT INTO Tutors (tutor_id, firstname, lastname, class, hours, num_hours, department, writing_lab) 
		VALUES 
			('NULL',
			 '" . $firstname . "',
			 '" . $lastname . "',
			 '" . $class . "',	
			 '" . $hour_str  . "', 
			 '" . $num_hours . "', 
			 '" . $dept . "', 
			 '" . $writing_lab ."');";
		//echo $CreateQuery;
		$result = mysql_query($CreateQuery, $conn);
   	 	$_SESSION["lastname"] = $lastname;
	
		echo "<meta http-equiv='refresh' content='0;url=logout.php'>";
	}

?>
  </div>
  <div class="footer">
        <p>&copy;2013 Quincy University Learning Resource Center</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
