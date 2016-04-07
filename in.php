
<?php
session_start();


$dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
  if(! $conn ) {
     die('Could not connect: ' . mysql_error());
  }
  

   mysql_select_db( 'myrooms' );
  
    $name=$_POST['um'];
   $password=$_POST['pass'];

       $sql3 = "SELECT * FROM login";
    $retval = mysql_query( $sql3, $conn );
     if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{

	if($name==$row['username'] && $password==$row['password'])
	{
		$type=$row['r_id'];
		$lid=$row['l_id'];

		if ($type==1 || $type==2)
	 { $_SESSION['type'] = "$type";
	$_SESSION['lid'] = "$lid";
	
		header("Location: http://localhost/new/med.php");
	}
	
	else
	{$_SESSION['type'] = "$type";
$_SESSION['lid'] = "$lid";
header("Location: http://localhost/new/a.php");
	}
}
	else
		echo "yet not registered";

}
?>