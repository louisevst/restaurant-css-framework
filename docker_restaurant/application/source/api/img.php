<?php

include '../includes/connectMenuDB.php';
  $query = "SELECT name, path FROM `images`";
  $stmt = $conn->prepare($query);
  // EXECUTING THE QUERY
  $stmt->execute();

  $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  // FETCHING DATA FROM DATABASE
  $result = $stmt->fetchAll();

$data = json_encode($result);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
  echo $data;
}
?>