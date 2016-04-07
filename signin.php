

<html>
<head>
<style>
#p1
{
	border: 1px ;
border: solid gray;
	width: 40%;
	height: 50%;
	border-radius: 4px;
	box-shadow: 7px;
	}

	table {
		
    border-collapse: collapse;
    width: 100%;

    margin-left: 25px
}

td {

    padding: 10px;
}
a:link {
    color: #00BFFF;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: gray;
    background-color: transparent;
    text-decoration: none;
    }
    #i
    {
    	padding: 1px;
    	
    
    	height: 32px;
    	width: 210px;
    	display: inline-block;
    	
    	font-family: calibri;
    	font-size: 15px;
    	border-radius: 4px;
    	border:1px solid #dcdcdc;
    }
</style>

</head>
<body >
<div id="p1">
<div style="display: inline-block;margin-left: 30px;color: black;font-family: calibri;font-size: 18px">
	<h4>Log Into Your Account</h4>
</div>
<div style="display: inline-block;margin-left: 120px;font-family: calibri;font-size: 15px">
	<a href="ab.htm">Don't have an account? Sign Up!</a>
</div>
<form method="post" action="in.php">
	
	<table  >
 
 
  <tr>
    <td ><input type="text" placeholder="Username" name="um" required id="i" style="text-align: left" ></input></td>
    <td ><span id="i" style="background-color:  #4682B4;"><img src="img/fb.png" height="28px" width="28px" align="left"  ><p style="margin-top: 7px;padding: 0">Sign In with Facebook</p></span></td>

  </tr>
  <tr>
    <td ><input id="i" type="password" placeholder="Password" name="pass" required style="text-align: left"></input></td>
    <td ><span id="i" style="background-color: #00BFFF;"><img src="img/t1.png" height="30px" width="30px" align="left"> <p style="margin-top: 7px;padding: 0">Sign In with Twitter  &nbsp</p></span></td>
   
  </tr>
  <tr>
  
    <td ><input id="i" type="submit"  value="submit" 
    style="background-color: #8CB607;color: WHITE"></input></td>
    <td ><span id="i" style="background-color:  #DE553C;"><img src="img/g.png" height="30px" width="30px" align="left" > <p style="margin-top: 7px;padding: 0">Sign In with Google+</p></span></td>
    
  </tr>
  
</table></form>
	<div style="margin-left: 30px;margin-top: 8px;color: gray">
		<input type="checkbox">Remember me</input>
		<a href="" style="margin-left: 35px">forget password?</a>
	</div>	
</div>
</body>
</html>