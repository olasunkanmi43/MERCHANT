	

	<?php
			Session_start();

			unset($_SESSION['merchant_id']);
			unset($_SESSION['admin_name']);

			header("location:sign_up.php");


	?>