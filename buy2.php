<?php 
session_start();
$con=mysql_connect('localhost','root','ladygaga123');
	if(!$con)
	{
		die ('connection error'.mysql_error());
	}
	mysql_select_db('test1',$con);




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
<?php

if(isset($_POST['buy']))
{


echo "<h3>You Have Purchased:- </h3>";
	echo "<table border=5 color=black>";
	echo "<tr>";
	echo "<th>Item</th>";	
	echo "<th>Price</th>";
	echo "<th>Quantity</th>";
	echo "<th>Sub-Total</th>";
	echo "</tr>";

  $total = "";
  $valid_products = array();

  foreach ($_POST['buy'] as $products) {

  	if (isset($products['Product_Name']) && !empty($products['qty']) && $products['qty'] > 0     ) {


     echo "<tr>";
     echo "<td>". $products['Product_Name']."</td>";
     echo "<td>$". $products['Price']."</td>";
     echo "<td align = 'center'>". $products['qty']."</td>";
     echo "<td align = 'right' >$". $products['qty'] * $products['Price'] ."</td>";

    $total += $products['qty'] * $products['Price'] ;

     

     echo "</tr>";


     array_push($valid_products, $products);
     
  	}
  }

  $_SESSION['buy'] = $valid_products;

   echo "<tr><td colspan=3 align='center'> Total Amount : </td><td align = 'right'  >$".$total."</td></tr>";

   echo "</table>";

 }
   


?>

<a href="address.php">Confirm</a>
<a href="logout.php">Logout</a>
</body>
</html>