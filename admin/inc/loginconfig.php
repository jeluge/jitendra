<?php
require "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT * FROM admin WHERE a_email='$email' && a_pass='$password'";
        $result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			if($email == $row['a_email'] && $password == $row['a_pass']){
                echo"match";
				$user_id = $row['a_id'];
                setcookie('user_logged_in', md5($user_id), COOKIE_TIME, "/");
				setcookie('user_id', $user_id, COOKIE_TIME, "/");
				header('location:../dashboard.php');
				exit();
            }
            else{
                echo "Email and password not found";
            }
        }
    }
}
echo "this is config page";
?>