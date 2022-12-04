<?php

		include('db.php');

		function page_protect() {
			if(!isset($_SESSION['merchant_id']) && (!isset($_SESSION['merchant_name']))) {
				header("location:home.php");
			}
		}

?> 