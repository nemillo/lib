<?php

$password="weqmXe12345";
$user="epiz_28718908";
$dsn = "mysql:host=sql112.epizy.com; dbname=epiz_28718908_lib; charset=utf8mb4";
try {
    $database = new PDO($dsn,$user,$password);

} catch (Exception $e) {
    echo "<script>alert('Connection error')</script>";
}

?>