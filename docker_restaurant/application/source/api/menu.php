<?php

include '../includes/connectMenuDB.php';

//$stmt = $conn->prepare("SELECT id, title, description, category, price FROM menu");
//$stmt->execute();

/*foreach(($stmt->fetchAll()) as $k=>$v) {
    print_r ($v);
  }*/
  // SQL QUERY
  $query = "SELECT title, description, price, category, category_id FROM `menu`";
  $stmt = $conn->prepare($query);
  // EXECUTING THE QUERY
  $stmt->execute();

  $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  // FETCHING DATA FROM DATABASE
  $result = $stmt->fetchAll();
  // OUTPUT DATA OF EACH ROW
//  foreach ($result as $row) 
//  {
//      echo "Title: " . $row["title"]. " - Description: " . 
//        $row["description"]. " | Price: " . $row["price"]. "<br>";
//  }
//  print_r ($result);
$data = json_encode($result);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
  echo $data;
}
?>