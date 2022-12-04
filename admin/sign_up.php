<?php

		session_start();
		include("../db/db.php");
		include("../functions/function.php");
?>



<!DOCTYPE html>
<html>
<head>
	<title>Merchant</title>
</head>
<body>


		<h3>Merchant Registration Form</h3>
		<p>Please fill the form fields below</p>

			<?php

				if(isset($_POST['submit'])) {
					$e = array();
				
				if(empty($_POST['fname'])) {
					$e['fname'] = "Enter Merchant Firstname";
				} else {
					$fn = mysqli_real_escape_string($db, $_POST['fname']);
				}

				if(empty($_POST['lname'])) {
					$e['lname'] = "Enter Merchant Lastname";
				} else {
					$ln = mysqli_real_escape_string($db, $_POST['lname']);
				}

				if(empty($_POST['uname'])) {
					$e['uname'] = "Enter Merchant Username";
				} else {
					$un = mysqli_real_escape_string($db, $_POST['uname']);
				}

				if(empty($_POST['num'])) {
					$e['nu'] = "Enter Merchant Phone Number";
				} else {
					$nu = mysqli_real_escape_string($db, $_POST['num']);
				}

				if(empty($_POST['mail'])) {
					$e['mail'] = "Enter your Email Address";
				} else {
					$email = mysqli_real_escape_string($db, $_POST['mail']);
				}

				if(empty($_POST['sex'])) {
					$e['sex'] = "Select Merchant Gender";
				} else {
					$sex = mysqli_real_escape_string($db, $_POST['sex']);
				}

				if(empty($_POST['password'])) {
					$e['password'] = "Enter Merchant Password";
				} else {
					$password = mysqli_real_escape_string($db, $_POST['password']);
				}

				if(empty($e)) {
				$query = mysqli_query($db, "INSERT INTO register VALUES(NULL, '".$fn."', '".$ln."', '".$un."', '".$nu."', '".$email."', '".$sex."', '".$password."', NOW())")
				or die(mysqli_error($db));

				

				echo "<h3 style=\"color:blue\">Merchant Successfully Added</h3>";

				header("location:home.php");

		}
	}



	?>

		<form action="" method="post">

			<p><?php create_text('fname', 'Firstname') ?>
				<span><?php if(isset($e['fname'])) echo $e['fname'] ?></span>
			</p>
			<p><?php create_text('lname', 'Lastname') ?>
				<span><?php if(isset($e['lname'])) echo $e['lname'] ?></span>
			</p>

			<p><?php create_text('uname', 'Username') ?>
				<span><?php if(isset($e['uname'])) echo $e['uname'] ?></span>
			</p>
			<p><?php create_text('num', 'Number', $type = "number") ?>
				<span><?php if(isset($e['nu'])) echo $e['nu'] ?></span>
			</p>

			<p><?php create_text('mail', 'Email', 'email') ?>
				<span><?php if(isset($e['mail'])) echo $e['mail'] ?></span>
			</p>
			<p>Gender: <?php
							create_radio('sex', "Male");
							create_radio('sex', "Female");
							?>
						<span><?php if(isset($e['sex'])) echo $e['sex'] ?></span>
					</p>

			<p><?php create_text('password', 'Password') ?>
				<span><?php if(isset($e['password'])) echo $e['password'] ?></span>
			</p>

			<input type="submit" name="submit" value="Sign Up">


</form>



</body>
</html>