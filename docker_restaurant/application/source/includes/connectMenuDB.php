<?php 
// on utilise getenv pour des questions de securité, ca va chercher les var ds .env
$servername = getenv('MYSQL_HOST');
$username = getenv('MYSQL_ROOT_USER');
$password = getenv('MYSQL_ROOT_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>