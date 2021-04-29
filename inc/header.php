<?php
if(isset($_SESSION['id']) && $_SESSION['id']!=""){

}
else{
    header('location:login.php');
    exit();
}
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <a class="navbar-brand" href="#!">Jitendra</a>
    <ul>
        <li><a href="#!">Home</a></li>
        <li><a href="#!">Categories</a></li>
        <li><a href="#!">cart</a></li>
        <li><a href="#!">Account</a>
            <a href="logout.php">Logout</a>
        </li>
    </ol>