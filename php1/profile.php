<?php


// $validUsername = $_GET["id"];
session_start();

$validUsername = $_SESSION['id'];

echo "Welcome ", $validUsername;
 ?>