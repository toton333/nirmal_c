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
<form name="f1">
Enter Product Name:<input type="text" name="pname" /><br />


<input type="submit" name="search" value="Search" />

</form>
<?php
$con= mysql_connect('localhost','root','ladygaga123');
if(!$con)
{
	die ('connection error'.mysql_error());
}
mysql_select_db('test1',$con);
$sql1="select * from products";
$sql="";
$r=0;
if(isset($_GET["search"]))
{
	if($_GET['pname']!=null)
	$sql="select * from products where Product_Name = '".mysql_real_escape_string($_GET['pname'])."'";
	else
	$sql="select * from products order by Product_Name";
	
	$sql1=$sql;

echo 'Enter Quantity<input type="text" name="quantity"/><br/>';
}

if($r>0)
	echo "<br> Done successfully";
	echo "<br> Mysql is:$sql";
	echo "<form name=\"f2\" action=\"buy2.php\" method=\"post\">";
	$result=mysql_query($sql1);
	if(mysql_num_rows($result))
	{
		echo "<table border='1'>
		<tr>
		<th>Product_Name</th>
		<th>Description</th>
		<th>Stock</th>
		<th>Price</th>
		<th>Company</th>
		<th>Enter Quantity</th>
		</tr>";
		
	}
	
	else
	echo "Not Found";

  


	while($row=mysql_fetch_object($result))
	{



		echo "<tr>";
		echo "<td>".$row->Product_Name;echo "<input type='checkbox' name=\"buy[". $row->Product_id ."][Product_Name]\" value=\"". $row->Product_Name ."\"/> </td>";
		echo "<td>".$row->Description."</td>";
		echo "<td>".$row->Quantity ."</td>";
		echo "<td>$".$row->Price ."</td>";
        
        echo "<input type=\"hidden\" name=\"buy[".$row->Product_id ."][Price]\" value=\"". $row->Price ."\"   />";

		echo "<td>".$row->Company."</td>";
		echo "<td><input type=\"textbox\" name=\"buy[".$row->Product_id ."][qty]\" />";
		echo "</tr>";
		echo "";
			
		}
	echo "</table>";
     
    
	echo '<input type="submit" value="Buy"/>';
	echo "</form>";
	mysql_close($con);

	
?>
<a href="logout.php">Logout</a>
</body>
</html>