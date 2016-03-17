<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<h1>COMPUTER PARTS STORE<h1/>
<link rel="stylesheet" type="text/css" href="style.css" />
<body>
<form name="f1">
<input type="submit" name="login" value="USER LOGIN"  />
<input type="submit" name="login2" value="ADMIN LOGIN" />
<input type="submit" value="About" name="About" />
<input type="submit" value="Contact" name="Contact" />		
<input type="submit" value="Register" name="Register" />
</form>

<?php
if(isset($_GET["login"]))
{
	 header("Location:userlogin.php");
	
}
elseif(isset($_GET["login2"]))
{
	header("Location:adminlogin.php");
}
elseif(isset($_GET["About"]))
{
	 header("Location:about.php");
}
elseif(isset($_GET["Contact"]))
{
	 header("Location:contact.php");
}
elseif(isset($_GET["Register"]))
{
	 header("Location:user_reg.html");
}

?>


</body>

</html>