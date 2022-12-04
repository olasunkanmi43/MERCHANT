<?php
		session_start();
        include('../db/db.php');

        $merchant_id = $_SESSION['merchant_id'];

?>

		<hr>

		<?php $product_id = $_GET['id']; ?>

		<h3>Edit Page for Product: <?php echo $product_id ?></h3>

		<?php 
				$select = mysqli_query($db, "SELECT * FROM product WHERE product_id ='".$product_id."'") or die(mysqli_error($db));

				$r = mysqli_fetch_array($select);
					extract($r);
		?>


			<?php 
					if(isset($_POST['edit'])) {
						$prod = mysqli_real_escape_string($db, $_POST['prod']);
						$desc = mysqli_real_escape_string($db, $_POST['description']);
						$price = mysqli_real_escape_string($db, $_POST['price']);
						$quan = mysqli_real_escape_string($db, $_POST['quan']);

						$update = mysqli_query($db, "UPDATE product SET product_name = '".$prod."', product_description = '".$desc."',  product_price= '".$price."', product_quantity = '".$quan."' WHERE product_id = '".$product_id."'") or die(mysqli_error($db));
						header(("location:view_product.php"));
					}
			?>

		<form action="" method="post">

				<p>Product Name: <input type="text" name="prod" value="<?php echo $product_name ?>"></p>
				<p>Product Description: <br><textarea name="description" rows="10" cols="30"><?php echo $product_description ?></textarea></p>
				<p>Product Price: <input type="text" name="price" value="<?php echo $product_price ?>"></p>
				<p>Product Quantity: <input type="number" name="quan" value="<?php echo $product_quantity ?>"></p>

					<input type="submit" name="edit" value="Edit">

			</form>


</body>
</html>