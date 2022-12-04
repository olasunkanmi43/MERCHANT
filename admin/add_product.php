<?php 
 
          session_start();
          include("../db/db.php");


          $merchant_id = $_SESSION['merchant_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>

            <a href="add_product.php">upload file</a>
            <a href="view_product.php">view file</a>
            <hr>

            <?php 
                  $max_size = 8097152;
                  $extension = array("image/jpg", "image/jpeg", "image/png");

                  if(array_key_exists('register', $_POST)){
                  	$error = array();
                  	if(!in_array($_FILES['upload']['type'], $extension)){
                  		$erorr[] = "File not acceptable";
                  	}
                  	if($_FILES['upload']['size'] >$max_size){
                  		$error[] = "File is too large. Maximum Size: ".$max_size;
                  	}
                  	$filename = str_replace(" ", "_", $_FILES['upload']['name']);

                  	$destination ='images/'.$filename;

                  	if(!move_uploaded_file($_FILES['upload']['tmp_name'], $destination)){
                  		$error[] = "File Not Successfully Added";
                  	}
                  	if(empty($_POST['prod'])){
                  		$error[] = "You have not entered Product Name";
                  	}else{
                  		$p_name = mysqli_real_escape_string($db, $_POST['prod']);
                  	}
                  	if(empty($_POST['description'])){
                  		$error[] = "You have not entered Item Description";
                  	}else{
                  	$description = mysqli_real_escape_string($db, $_POST['description']);	
                  	}

                    if(empty($_POST['category'])){
                      $error[] = "You have not entered Category";
                    }else{
                    $cate = mysqli_real_escape_string($db, $_POST['category']); 
                    }

                    if(empty($_POST['price'])){
                      $error[] = "You have not entered Product Price";
                    }else{
                    $price = mysqli_real_escape_string($db, $_POST['price']); 
                    }

                    if(empty($_POST['quan'])){
                      $error[] = "You have not entered Product Quantity";
                    }else{
                    $quan = mysqli_real_escape_string($db, $_POST['quan']); 
                    }

                  	if(empty($error)){
                      $insert =mysqli_query($db, "INSERT INTO product VALUES(NULL, '".$p_name."', '".$description."', '".$cate."', '".$price."', '".$quan."', '".$filename."', '".$merchant_id."', NOW())") or die(mysqli_error($db));
                      echo "<h3>Record Successfully Added</h3>";
                  	} else{
                  		foreach ($error as $err) {
                  			echo "<p>*$err</p>";
                  		}
                  	}

                  }






            ?>

	  <h3>Item Registrarion Form</h3>
	  <p>Please fill the form fields below</p>

	<form enctype="multipart/form-data" action="" method="post">
		
    
        <p>Product Name: <input type="text" name="prod"></p>

        <p>Product Description:<br><textarea name="description" rows="10" cols="30"></textarea></p>

        <p>Category: <select name="category">
              <option value="">Select Category</option>

              <?php $cate = mysqli_query($db, "SELECT * FROM category") or die(mysqli_error($db)) ?>
              <?php while ($cat = mysqli_fetch_array($cate)) { ?>

                <option value="<?php echo $cat[0] ?>"><?php echo $cat[1] ?></option>
              <?php } ?>
      </select> <?php if(isset($e['category'])) echo$e['category'] ?></p>

        <p>Product Price: <input type="number" name="price"></p>

        <p>Product Quantity: <input type="number" name="quan"></p>
      
        <p>Upload File:<input type="file" name="upload"></p>
        <input type="submit" name="register" value="Add Product">





	</form>

</body>
</html>