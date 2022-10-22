<<?php 

include "include/connect.php";

session_start();
session_destroy();
header("location:login.php");
 ?>