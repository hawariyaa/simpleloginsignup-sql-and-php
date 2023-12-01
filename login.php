
<?php
require "config.php";

// Retrieve form input and perform data validation
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  if(empty($username) || empty($email) || empty($password)){
    echo "<script>alert('Please enter a valid username, email, and password')</script>";
  } else {
    $insert = $conn->prepare("INSERT INTO login (username, email, password) VALUES (:username, :email, :password)");
    $insert->execute([
      ":username" => $username,
      ":email" => $email,
      ":password" => $password,
    ]);
  }
}
?>
