<?php
require 'templates/header.php';
?>
<form action = "inc/loginconfig.php" method = "post">
    <label>Email  :</label><input type = "text" name = "email" class = "box"/><br /><br />
    <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
    <input type = "submit" name="login" value = "Login"/><br />
</form>
<?php
require 'templates/footer.php';
?>