<?php

$validUsername = "21MIS7128";
$validPassword = "3699";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Check if id and pass parameters are set in the POST request
  if (isset($_POST["id"]) && isset($_POST["pass"])) {
    // Retrieve the submitted username and password
    $enteredUsername = $_POST["id"];
    $enteredPassword = $_POST["pass"];

    // Print the submitted username and password
    // print_r($enteredUsername);
    // print_r($enteredPassword);

    // Validate the credentials
    if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
      // Successful login
      // header('Location: profile.php?id=' . $validUsername);
      session_start();

      $_SESSION['id'] = $validUsername;

      header('Location: profile.php');
    } else {
      // Invalid credentials
      echo " Login Failed! Please check your username and password.";
    }
  } else {
    // Handle missing parameters (id and/or pass)
    echo " Invalid request. Please provide both ID and PASS.";
  }
}


?>