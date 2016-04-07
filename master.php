
<html>
<head>
<link rel="stylesheet" type="text/css" href="p1.css">
<script src="jquery-1.12.1.js"></script>
<script src="p1.js">
</script>
<?php
 session_start();
 	include('connect_db.php');
$type=$_SESSION['type'];
$lid=$_SESSION['lid'];

?>

</head>
<body>
<div>
 <?php 
  echo '<img src="img/logo.jpg" width="4%" height="8%">';

 echo  '<span style="font-size: 30px">MYROOMS</span>'; 
 echo  '<span style="font-size: 15px">jaipur</span>';

 if($type==1)
{
echo '<span style="margin-left:30px;">WELCOME ADMIN</span>';
}
elseif ($type==2) 
{
	echo '<span style="margin-left:30px;">WELCOME MANAGER</span>';
}
else
{
		$result = mysql_query("SELECT username FROM login where l_id=$lid") 
		or die(mysql_error()); 
		while($row = mysql_fetch_array( $result )) 
			{
                	echo '<span style="margin-left:30px;"> WELCOME '.$row['username'].'</span>';
				
			}

   	$result = mysql_query("SELECT status FROM book where l_id=$lid") 
		or die(mysql_error()); 
			while($row = mysql_fetch_array( $result )) 
			{

				echo '<span style="margin-left:200px;">your booking is '.$row['status'].'</span>';
			}

   
}

 ?>
      <img src="img/logo1.jpg" width="10%" height="8%" align="right">


</div>
<div id="d">


<?php
	if($type==1)
{

 echo '<ul>
	<div>
  <li ><a href="view.php">ROOMS INFORMATION</a></li>
  </div>
  <div>
   <li><a href="viewmanager.php">MANAGER INFORMATION</a></li>
   </div>
   <div>
  <li><a href="viewbooking.php">VERIFY BOOKING</a></li>
   </div>
</ul>';
}
elseif ($type==2) 
	{

echo '<ul>
	<div>
  <li ><a href="view.php">ROOMS INFORMATION</a></li>
  </div>
  
   <div>
  <li><a href="viewbooking.php">VERIFY BOOKING</a></li>
   </div>
</ul>';
}
	else{
	echo '<ul>
	<div id="k1">
  <li id="i1" ><a href="#">ROOMS & SUITES</a></li>
  </div>
  <div id="k2">
   
  <li id="i2"><a  href="#">MEETING & EVENTS </a></li>
</div>
<div id="k3">
  <li id="i3"><a  href="#">DINNING</a></li>
</div>
<div id="k4">
  <li id="i4"><a href="#">ABOUT</a></li>
</div>
</ul>';}
?>
</div>
</body>
</html>