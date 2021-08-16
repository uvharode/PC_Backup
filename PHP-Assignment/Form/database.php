<?php

$conn = mysqli_connect("localhost", "root","","php-july");
if($conn->connect_error){
    die("Failed to connect".$conn->connect_error);
}

?>