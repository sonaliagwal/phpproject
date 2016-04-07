<?php
session_start();



/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm()
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
 <?php
 $checkin=$_POST['date'];
    $checkout=$_POST['date1'];
   $ad=$_POST['ad'];
   $ch=$_POST['ch'];

  $result = mysql_query("SELECT * FROM room ") 
    or die(mysql_error());

 ?> 
 <form action="" method="post">
 <div>

<select name=room >

<?php

while($row = mysql_fetch_array( $result )) 
{
   $tot1=$row['total_no'];
  $room1=$row['room_type'];
  echo $room1;
  $result1 = mysql_query("SELECT count('r_type') as a FROM book where r_type='$room1' ") ;

    while($row = mysql_fetch_array( $result1 )) 
    {
    $tot=$row['a'];
  
  }
    if($tot<$tot1 )
    {
echo '<option value='.$room1.'>'.$room1.'</option>';
}
}
?>
</select>
<input type="text" readonly name="checkin" value="<?php echo $checkin ?>"></input>
 <input type="text" readonly name="checkout" value="<?php echo $checkout ?>"></input>
  <input type="text" readonly name="ad" value="<?php echo $ad ?>"></input>
   <input type="text" readonly name="ch" value="<?php echo $ch ?>"></input>
<input type="submit" name="submit" value="BOOK">
  </form> 
 </body>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('connect_db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { $lid=$_SESSION['lid'];
$checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];
   $ad=$_POST['ad'];
   $ch=$_POST['ch'];

 // get form data, making sure it is valid
 $r_type = mysql_real_escape_string(htmlspecialchars($_POST['room']));

  mysql_query("INSERT INTO  book (
`l_id` ,
`checkin` ,
`checkout` ,
`adults` ,
`childern` ,
`price` ,
`status` ,
`r_type`
)
VALUES (
'$lid',   '$checkin',  '$checkout',  '$ad',  '$ch',  '234',  'pending',   '$r_type')") or die(mysql_error()); 
   header("Location: a.php"); 
 
 }
 
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm();
 }
?>