<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#66CCFF">
<form method="post" />

<?php
$_Product_Name=$_POST['pname'];
$_Price=$_POST['price'];
$_Quantity=$_POST['quan'];
$con= mysql_connect("localhost","root","");
mysql_select_db("test",$con);


?>
</body>
</html>