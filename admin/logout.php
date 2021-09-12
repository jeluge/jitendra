<?php
if(isset($_GET['logout'])){
		unset($_COOKIE['user_logged_in']);
		unset($_COOKIE['user_id']);

		setcookie('user_logged_in',' ',time() - 86400, '/');
		setcookie('user_id',' ',time() - 86400, '/');
		header('location:login.php');
		exit();
}