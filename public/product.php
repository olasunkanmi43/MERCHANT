<?php
		$db = mysqli_connect("localhost", "root", "", "merchant") or die(mysqli_error($db));

		$product_id = $_GET['id'];

		$select = mysqli_query($db, "SELECT * FROM product WHERE product_id = '".$product_id."'") 
		or die(mysqli_error($db));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Products View</title>
</head>
<body>

		<a href="index.php">Category</a>

		<table border="1">
			<tr>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Description</th>
				<th>Product Price</th>
				<th>Image</th>
			</tr>
			
			<tr>
				<?php 
					while($r = mysqli_fetch_array($select)){ ?>
					<td><?php echo $r[0] ?></td>
					<td><?php echo $r[1] ?></td>
					<td><?php echo $r[2] ?></td>
					<td><?php echo $r[4] ?></td>
					<td><img src="../admin/images/<?php echo $r[6] ?>" width="300" height="300"></td>			
			</tr>
				<?php } ?>

				<?php
						echo "Records:".mysqli_num_rows($select);
				 ?>


		</table>

</body>
</html>