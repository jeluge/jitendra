<?php
    define('COOKIE_TIME',time() + (86400 * 1));
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'jitendra');
   define('IMG_URL','http://localhost/jitendra/admin/images/');
    define('IMG_PATH','C:/xampp/htdocs/jitendra/admin/images/');
   global $conn;
   $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD ,DB_DATABASE );
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}