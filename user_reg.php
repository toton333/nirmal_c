<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="linkstyle.css" type="text/css" />
</head>

<body>
<?php
if(isset($_POST['t1']))
{
$user_name=$_POST['t1'];
$pwd=$_POST['t2'];
$con=mysql_connect('localhost','root','ladygaga123');
if(!$con)
{
	die ("connection error".mysql_error());
}else
{
	mysql_select_db('test1',$con);
	$sqlquery="insert into user_detail values('$user_name','$pwd')";
	if(!mysql_query($sqlquery,$con))
	{
		die ("error".mysql_error());
	}
	else
	{
		echo "Registered successfully";
	}
echo "<br/>";
echo"<a href='userlogin.php'>Proceed to userlogin</a>";
}
}
else
	echo header("Location:user_reg.html");
?>
</body>
</html>