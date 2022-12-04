		<?php

				session_start();
				include('../db/db.php');

				


		?>



<!DOCTYPE html>
<html>
<head>
	<title>::Sign In</title>

	

</head>
<body>
		<div class="container">
		<h1>Welcome!!!</h1>
		<p><strong>Please enter your Merchant Name and Password</p></strong>

		<?php

			if(isset($_POST['submit'])) {
				$er = array();
			
				if(empty($_POST['aname'])) {
					$er['admin'] = "You have not entered your Merchant Username";
				} else {
					$aname = mysqli_real_escape_string($db, $_POST['aname']);
				}

				if(empty($_POST['pword'])) {
					$er['pass'] = "You have not entered your Merchant Password";
				} else {
					$pword = mysqli_real_escape_string($db, $_POST['pword']);
				}

				if(empty($er)) {
					$query = mysqli_query($db, "SELECT * FROM register WHERE username = '".$aname."' AND password = '".$pword."'") or die(mysqli_error($db));

					//echo mysqli_num_rows($query);

					if(mysqli_num_rows($query) == 1) {
						$result = mysqli_fetch_array($query);
						
						//BELOW WE ESTABLISH SESSION VARIABLES FOR THE ADMIN LOGING IN
						$_SESSION['merchant_id'] = $result[0];
						$_SESSION['username'] = $result[1];

						//BELOW WE REDIRECT THE ADMIN INTO THE HOME PAGE
						header("location:add_product.php"); 	//WE NOW LOG THE ADMIN IN
					} else {
						$msg = "Invalid Merchant Name and/or Password, please sign up";
						header("location:home.php?msg=$msg");
					}


				}
			

			}


			if(isset($_GET['msg'])) {
				echo "<h5 class=\"e\">".$_GET['msg']."</h5>";
			}

		?>

		<form action="" method="post">

			<p>Merchant Name: <input type="text" name="aname">
				<span class="e"><?php if(isset($er['admin'])) echo $er['admin'] ?></span>
			</p>
			<p>Merchant Password: <input type="password" name="pword">
				<span class="e"><?php if(isset($er['pass'])) echo $er['pass'] ?></span>
			</p>
			<input type="submit" name="submit" value="Login">
			<a href="sign_up.php">Sign Up</a>
		
		</form>

	</div>

</body>
</html>