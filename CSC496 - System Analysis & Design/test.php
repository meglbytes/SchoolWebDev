<html>
<body>
  <?php
   echo 'Hello World';
   $conn = mysql_connect("stewie.quincy.edu", "LRC_MySQL", "lrc2013");
   if(!$conn)
   {
     die("No Connection");
   }
   mysql_select_db("LRC_MySQL", $conn);  
   $TuesQuery = "SELECT tues_open FROM Admin_Options;";
   echo $TuesQuery;
   $result = mysql_query($TuesQuery, $conn);
   while($row = mysql_fetch_array($result))
   {
   	$to=$row["tues_open"];
   	echo $to;
   }

   if($to == -1 || $tc == -1)
   {
     echo '<h3>No Hours Offered</h3>';
   }
   else
   {
     $tc = 20;
     for($to = 10; $to<=$tc;$to++)
     {
       echo '<label>';
         echo '<input type="checkbox" name="10" value="yes" id="10" />';
	 echo '10:00 AM</label>';
       echo '<br />';
     } 
  ?>
</body>
</html>

