<?php

$con = mysqli_connect("localhost", "root", "", "php-crud");

if(!$con){
    die("Connection Failed" . mysqli_connect_error());
}

?>