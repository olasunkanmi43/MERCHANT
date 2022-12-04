<?php
		session_start();
		include('../db/db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
			<?php $select = mysqli_query($db, "SELECT * FROM category") or die(mysqli_error($db));
			while($r = mysqli_fetch_array($select)){ ?>

				<ul>
						<ol>
							<a href="product.php?id=<?php echo $r[0] ?>"><?php echo $r[1] ?></a>
						</ol>

				</ul>

			<?php } ?>

        
            
         

</body>
</html>