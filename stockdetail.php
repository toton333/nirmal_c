<?php 
if (!isset($_COOKIE['uname']) || ! isset($_COOKIE['pwd'])) {
	header('Location: index.php');
	exit;
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<html>
<form name="f1">
Enter Product Name:<input type="text" name="pname" /><br />
Enter Description:<input type="text" name="desc" /><br />
Enter Quantity:<input type="text" name="quan" /><br />
Enter Price:<input type="text" name="price" /><br />
Enter Company:<input type="text" name="comp" /><br />
<input type="submit" name="insert" value="INSERT" />
<input type="submit" name="update" value="UPDATE" />
<input type="submit" name="delete" value="DELETE" />
</form>


<?php
$con= mysql_connect('localhost','root','ladygaga123');
if(!$con)
{
	die ('connection error'.mysql_error());
}
mysql_select_db('test1',$con);
$sql1="select *from products";
$sql="";
$r=0;
if(isset($_GET["insert"]))
{
	$sql= "insert into products values('','".$_GET['pname']."','".$_GET['desc']."',".$_GET['quan'].",".$_GET['price'].",'".$_GET['comp']."')";

$r=mysql_query($sql);

}
else if(isset($_GET["update"]))
{
$sql= "update products set Price=".$_GET['price']." where Product_Name='".$_GET["pname"]."'";

$r=mysql_query($sql);
}
else if(isset($_GET['delete']))
{
$sql= "delete from products where Product_Name='".$_GET['pname']."'";
$r= mysql_query($sql);
}
	if($r>0)
	echo "<br> Done successfully";
	echo "<br> Mysql is:$sql";
	$result=mysql_query($sql1);
	if(mysql_num_rows($result))
	{
		echo "<table border='1'>
		<tr>
		<th>Product_Name</th>
		<th>Description</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Company</th>
		</tr>";
	}
	else
	echo "Not Found";
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[4]."</td>";
		echo "<td>".$row[5]."</td>";
		echo"</tr>";
	}
	echo "</table>";
	mysql_close($con);
	
?>

<a href="logout.php">Logout</a>
</body>
</html>