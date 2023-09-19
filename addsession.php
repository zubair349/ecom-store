<?php
session_start();
if(!isset($_SESSION["username"])){
    header("location:index_ad.php");
}

?>