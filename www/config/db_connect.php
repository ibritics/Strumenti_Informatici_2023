<?php

$conn = mysqli_connect('localhost', 'Ibra', 'SI1234', 'portfolio'); //host, username, password, nome del db

if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}



?>