<?php

// connect to db
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "zubair_store";
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("unable to connect".mysqli_error($conn));
};

?>