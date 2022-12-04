<?php
		include('../db/db.php');

		$product_id = $_GET['id'];

		//echo "Product ID: ".$customer_id;

		$query = mysqli_query($db, "DELETE FROM add_product WHERE product_id = '".$product_id."'") or die(mysqli_error($db));

		header("location:view_product.php");


?>