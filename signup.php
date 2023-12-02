<?php require "config.php" ?>
<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

try{
if(isset($_POST['submit'])){




$stmt = $conn->prepare("SELECT id FROM login WHERE username = :username OR email = :email");

$stmt->execute([
  ":username" => $username,
  ":email" => $email,

]);
$userexists = $stmt->fetch();

if($userexists){
  echo "<script>alert('username or password already exists');</script>";
}
else{
$insert = $conn->prepare("INSERT INTO login (username , email, password) VALUES (:username , :email, :password)");

$insert->execute([
 ":username" => $username,
 ":email" => $email,
 ":password" => $password,

]);
}
}
}
catch(PDOException $h){
  echo "error:" .$h->getMessage();
}

 ?>
