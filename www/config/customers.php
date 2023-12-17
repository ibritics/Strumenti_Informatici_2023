<?php 
include('config/db_connect.php');  //Connection to the db taken from another module
$sql = 'SELECT customer_id, email, location FROM customers';
$result = mysqli_query($conn, $sql);
$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>