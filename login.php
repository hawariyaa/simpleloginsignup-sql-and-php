<?php require "config.php" ?>
<?php
// Assuming $conn is a valid PDO connection populated with appropriate database credentials
try{
if(isset($_POST['submit'])){


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$check = $conn->prepare("SELECT id, password FROM login WHERE username = :username AND email = :email");
$check->execute([
    ":username" => $username,
    ":email" => $email,
]);
$userData = $check->fetch();
//In PHP, the password_verify() function is used to verify whether a given plain-text password matches a hashed password. This function
// is specifically designed for securely comparing a user-provided password with the hashed password stored in a database or elsewhere.
if ($userData && password_verify($password, $userData['password'])) {
    echo "login successful";
} else {
    echo "user doesn't exist or incorrect password";
}
}
}
catch(PDOException $G){
  echo $G->getMessage();
}
?>
