<?php

try{
  define("host", "localhost");
  define("db", "login");
  define("username", "root");
  define("password", "");
  $conn = new PDO("mysql:host = ".host.";dbname = ".db.",username,password");
  //PDO error handling
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "<h2>connection successful</h2>";

}
catch(PDOException $Exeption){
  $Exeption->getMessage();
}



?>
