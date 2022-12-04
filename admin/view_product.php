<?php

        session_start();
        include('../db/db.php');


        $merchant_id = $_SESSION['merchant_id'];
        $db = mysqli_connect("localhost", "root", "", "merchant") or die(mysqli_error($db));
        $select = mysqli_query($db, "SELECT * FROM product WHERE merchant_id = '".$merchant_id."'") or die(mysqli_error($db)); 
?>


<!DOCTYPE html>
<html>
<head>
    <title>View_Product</title>
</head>
<body>
        <a href="add_product.php">Upload Product</a>
        <a href="view_product.php"> View Product</a>
        <a href="logout">Logout</a>
         <table border="1">

            <tr>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Category</th>
                <th>Product Price</th>
                <th>Images</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <tr>
                <?php  while($r = mysqli_fetch_array($select)){ ?>
              <td><?php echo $r[1] ?></td>
              <td><?php echo $r[2] ?></td>
              <td><?php echo $r[3] ?></td>
              <td><?php echo $r[4] ?></td>
              <td>
              <img src="images/<?php echo $r[6]?>"  width="200" height="150">
              </td> 
              <td><a href="edit.php?id=<?php echo $r[0] ?>">Edit</a></td>
              <td><a href="delete.php?id=<?php echo $r[0] ?>">Delete</a></td>  
          </tr>
         <?php } ?>
            
         </table>
</body>
</html>