<?php
require __DIR__.'/../inc/connection.php';
require __DIR__.'/../inc/header.php';

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT *  FROM admin WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        if(md5($password) == $row['password']){
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['email'];
            header('location:dashboard.php');
            exit();
        }
        else{
            echo"Email or Password didnot matched.";
        }
    }
}
?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <label>Email</label></br>
    <input type="text" placeholder="Enter Email" name="email" required>
    </br>
    <label>Password</label></br>
    <input type="password" placeholder="Enter Password" name="password" required>
    </br>
    <button type="submit" name="submit">Login</button>
    </br>
    <input type="checkbox" name="remember"> Remember me
</form>