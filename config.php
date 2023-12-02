<?php
try {
  define("HOST", "localhost");
  define("DB", "login");
  define("USER", "root");
  define("PASSWORD", "");
  $conn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSWORD);
  //PDO error handling
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $Exception) {
  echo $Exception->getMessage();
}
?>
