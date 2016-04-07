
<html>
<head>
<style>
body
{
margin: 0px;
}

#grad1 {
    height: 45%;
    background: #07D1CA;    
    background: -webkit-linear-gradient(left, #07D1CA , #4F95E5); 
    background: -o-linear-gradient(right, #07D1CA, yellow); 
    background: -moz-linear-gradient(right, #07D1CA, #4F95E5);  
    background: linear-gradient(to right, #07D1CA , yellow); 
    text-align: center;
	color: white;
    padding: none;
    margin: none;
    position: relative;


}
#random,#random1
{
  width: 5%;
  height: 20%;
  background-color: #80ff80;
  display: inline-block;
  margin: 0 ;
   position: absolute; 
  
}

</style>
<script src="jquery-1.12.1.js"></script>
    <script>
    function moveDiv() {
    var $div = $("#random");
    var $div1 = $("#random1");
    $div.fadeOut(1000, function() {
        var maxLeft = $("#grad1").width() - $div.width();
        var maxTop = $("#grad1").height() - $div.height();
        var leftPos = Math.floor(Math.random() * (maxLeft + 1))
        var topPos = Math.floor(Math.random() * (maxTop + 1))
        console.log(leftPos);
        $div.css({ left: leftPos, top: topPos }).fadeIn(1000);
        $div1.css({ right: leftPos+10, bottom: topPos+10 }).fadeIn(1000);
    });
};
moveDiv();

setInterval(moveDiv, 2000);
</script>
</head>
<body>
<?php

$dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = 'root';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  
  if(! $conn ) {
     die('Could not connect: ' . mysql_error());
  }
  

   mysql_select_db( 'myrooms' );
   $email=$_POST['email'];
    $name=$_POST['name'];
   $password=$_POST['password'];

   $type=$_POST['cmbitems'];



    $sql1= "select r_id from role where r_name='$type'";
    $retval1 = mysql_query( $sql1, $conn );

    while($row = mysql_fetch_array($retval1, MYSQL_ASSOC))
  {
    
  $t=$row['r_id'];

  $sql3 = "INSERT INTO login(username,email,password,r_id) VALUES('$name','$email','$password','$t')";


    $retval = mysql_query( $sql3, $conn );
     

    if(!$retval ) {
    echo "already exits";
  }

}



   


?>
<div id="grad1">
<div id="random" >
</div>
<div id="random1" >
</div>
<div style="display: inline;margin: 0">
    <span style="display: inline-block;margin-left: 60%"><a href="signin.php" style=" color: white;text-decoration: none;font-family: calibri;">Sign In </a>
    </span >
    <span style="display: inline-block;margin-left:2% "><a href="ab.htm" style=" color: white;text-decoration: none;font-family: calibri;">Sign Up </a></span>
	<span  style=" font-size: 30px;font-family: calibri;"><h1 style=" margin: 0;padding: 0;padding-top: 55px ;z-index: 1">INNORAFT</h1></span>
	<span  style=" font-family: calibri;font-size: 15px;"><h3 style="margin: 0;padding: 0;z-index: 1">We build internet application and startegies.</h3></span>
	</div>
</div>	
<div align="center" style="color: #C0C0C0;margin-top: 5px;font-size: 20px">
<div style="width: 100%;height: 80%;position: relative;">
<img src="img/innoraft.jpg" width="300px"  height="180px" style="margin-top: 25px;"><
<pre style="color: black;font-family: calibri;text-align: justify-all;margin-left: 20px;margin-right: 70px;margin-top: 70px">We have helped all our clients, without exception, with hosting solutions suited to their needs and budgets.
We are Acquia partners and have moved enterprise applications to the Cloud.
 At times we have stitched together Amazon AWS based hosting solutions for custom needs of non-profits.
  For those who already came to us with a trusted hosting provider of choice, we have optimize</pre>
</div>
<footer style=" bottom: 0;width: 100% ;height: 120px;background-color: #313337;position: relative;margin: 0;padding: 0;border:none;">
<h1 style="text-align: center;font-family: Calibri;color:white;margin-top: 3px;">We would love to hear from you</h1>
<h3 style="text-align: center;font-family: calibri; padding-top: 2px;margin-top: 40px">Copyright@2013</h3>
	
</footer>
</body>
</html>