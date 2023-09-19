<?php
include("connectdb.php");

session_start();
session_unset();
session_destroy();

header("location:index_ad.php");
?>