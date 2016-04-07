<?php
 session_start();

$lid=$_SESSION['lid'];
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($r_type,$desc, $charge, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 <form action="" method="post">
 <div>
 <strong>room type: *</strong> <input type="text" name="r_type" value="<?php echo $r_type; ?>" /><br/>
 <strong>room description: *</strong> <input type="textarea" name="desc" value="<?php echo $desc; ?>" /><br/>
  <strong>charges: *</strong> <input type="text" name="charge" value="<?php echo $charge; ?>" /><br/>
 <p>* required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('connect_db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $r_type = mysql_real_escape_string(htmlspecialchars($_POST['r_type']));
 $desc= mysql_real_escape_string(htmlspecialchars($_POST['desc']));
 $charge = mysql_real_escape_string(htmlspecialchars($_POST['charge']));
 
 // check to make sure both fields are entered
 if ($r_type== '' || $desc == '' || $charge == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($r_type,$desc, $charge, $error);
 }
 else
 {echo $lid;
 // save the data to the database
 mysql_query("INSERT room SET room_type='$r_type',r_desc='$desc',l_id='$lid',charge=$charge")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','','');
 }
?>