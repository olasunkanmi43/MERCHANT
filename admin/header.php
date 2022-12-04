<?php

				session_start();
				include('../db/secure.php');


				page_protect();

				$merchant_id = $_SESSION['merchant_id'];
				$username = $_SESSION['username'];

		?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		<h3>You are now logged in</h3>
		<p>Logged in Merchant: <?php echo $username ?></p>
		<hr>

		<a href="home.php">Home</a>
		<a href="add_product.php">Add Customer</a>
		<a href="view_product.php">View Customer</a>
		<a href="logout.php">Click to Logout</a>