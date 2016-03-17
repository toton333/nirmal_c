<?php

session_start();



$con=mysql_connect('localhost','root','ladygaga123');
	if(!$con)
	{
		die ('connection error'.mysql_error());
	}
	mysql_select_db('test1',$con);


if (isset($_POST['submit'])) {
	if (!empty($_POST['b_address'])  && !empty($_POST['s_address'])  ) {

		$b_address = $_POST["b_address"];
		$s_address = $_POST["s_address"];

		$query = "INSERT INTO `orders` VALUES ";
		foreach ($_SESSION['buy'] as $products) {

			$username = $_COOKIE["uname"];
			$Product_Name = $products["Product_Name"];
			$qty = $products["qty"];
			$price = $products['qty'] * $products['Price'] ;
			$query .= "('', 

				      (select id from user_detail where user_name =  '$username'    ) ,
				      (select Product_id from products where Product_Name = '$Product_Name'  ) ,
				      '$qty',
				      '$price' ,
		              '$b_address' ,
		              '$s_address' ,
		              NOW()

				),";
		}

		$babai =  rtrim($query, ',');

		
      
		if(!mysql_query($babai,$con))
		{
			die ("error".mysql_error());
		}
		else
		{
			echo "Thank you for your purchase. Your order is under processing.";
			unset($_SESSION['buy']);

		} 


	
    
	}else{
		echo 'All fields are required.';
	}
}