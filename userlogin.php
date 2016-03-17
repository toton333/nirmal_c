<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<body bgcolor="cyan">
<form action="userlogin.php" method="POST"/>
Enter user name:<input type="text" name="t1" value="<?php if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; ?>"><br/>
Enter password:<input type="password" name="t2" value="<?php if(isset($_COOKIE['pwd'])) echo $_COOKIE['pwd']; ?>"><br/>
<input type="submit" name="submit" value="submit">
</form>
<?php
if(isset($_POST['submit']))
{
$n=$_POST['t1'];
$p=$_POST['t2'];
$con=mysql_connect("localhost","root","ladygaga123") or die("can not connect");
mysql_select_db('test1',$con);
$sql="select * from user_detail where user_name='$n' and pwd='$p'";
$r=mysql_query($sql,$con);
if(mysql_num_rows($r)>0)
{
echo "<font color=blue size=6>";
echo "login successfull";
echo "</font>";
SetCookie("uname",$n,time()+2000);
SetCookie("pwd",$p,time()+2000);
echo header("Location:userview.php");
}
else
{
echo "<font color=red size=6>";
echo "login not successfull";
echo "</font>";
}
}
?>
</body>
</html>