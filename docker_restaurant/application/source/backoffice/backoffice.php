<?php include '../includes/ConnectMenuDB.php';
         include 'upload.php';
        
         if (isset($_POST['form_id'])) {
        
            $form_id = $_POST['form_id'];
         
            // prepare and execute the DELETE statement
            $stmt = $conn->prepare(" DELETE FROM `form` WHERE `id` = :id");
            $stmt->bindParam(':id', $form_id);
            $stmt->execute();
            echo     "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
            "<div class='modal-content'>".
              "<div class='modal-header'>".
                "<h5 class='modal-title' id='ModalLabel'>Success !</h5>".
                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
                  "<span aria-hidden='true'>&times;</span>".
                "</button>".
              "</div>".
              "<div class='modal-body'>".
                "The message was deleted".
              "</div>".
            "</div>".
          "</div>";
        }
     if (isset($_POST['img_id'])) {
        
        $img_id = $_POST['img_id'];
        $stmt = $conn->prepare(" SELECT name FROM `images` WHERE `img_id` = :img_id");
        $stmt->execute(['img_id' => $img_id]);
        $item = $stmt->fetch();
        unlink('../caroussel-img/'.$item['name']);
        // prepare and execute the DELETE statement
        $stmt = $conn->prepare(" DELETE FROM `images` WHERE `img_id` = :img_id");
        $stmt->bindParam(':img_id', $img_id);
        $stmt->execute();
        echo     "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
        "<div class='modal-content'>".
          "<div class='modal-header'>".
            "<h5 class='modal-title' id='ModalLabel'>Success !</h5>".
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
              "<span aria-hidden='true'>&times;</span>".
            "</button>".
          "</div>".
          "<div class='modal-body'>".
            "The image was deleted".
          "</div>".
        "</div>".
      "</div>";
    }
    if (isset($_POST['id'])) {
    
        $id = $_POST['id'];
        // prepare and execute the DELETE statement
        $stmt = $conn->prepare("DELETE FROM menu WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo     "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
        "<div class='modal-content'>".
          "<div class='modal-header'>".
            "<h5 class='modal-title' id='ModalLabel'>Success !</h5>".
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
              "<span aria-hidden='true'>&times;</span>".
            "</button>".
          "</div>".
          "<div class='modal-body'>".
            "The menu item was deleted".
          "</div>".
        "</div>".
      "</div>";
    }
    if (isset($_POST['add']) AND isset($_POST['category']) AND isset($_POST['title']) AND isset($_POST['description']) AND isset($_POST['price'])) {
    if(strlen($_POST['category'])<3 OR strlen($_POST['title'])<3 OR $_POST['price']<1){
        echo     "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
        "<div class='modal-content'>".
          "<div class='modal-header'>".
            "<h5 class='modal-title' id='ModalLabel'>Error !</h5>".
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
              "<span aria-hidden='true'>&times;</span>".
            "</button>".
          "</div>".
          "<div class='modal-body'>".
            "You must complete every field except id and description".
          "</div>".
        "</div>".
      "</div>";
    }
    else
        {$stmt = $conn->prepare("INSERT INTO menu (category, category_id, description, title, price) 
                                VALUES (:category, :category_id, :description, :title, :price)");
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':price', $price);
        
        // insert a row
        $category = $_POST["category"];
        $category_id = ($category == 'Starters') ? "0" : (($category == 'Main Dishes')  ? "1" : (($category == 'Desserts') ? "2" : "3"));
        $description = $_POST["description"];
        $price = $_POST["price"];
        $title = $_POST["title"];
        
        $stmt->execute();
        
        echo     "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
        "<div class='modal-content'>".
          "<div class='modal-header'>".
            "<h5 class='modal-title' id='ModalLabel'>Success !</h5>".
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
              "<span aria-hidden='true'>&times;</span>".
            "</button>".
          "</div>".
          "<div class='modal-body'>".
            "The menu item was added".
          "</div>".
        "</div>".
      "</div>";}
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="backend.css"/>
</head>

<body class="px-5">
<nav class="navbar navbar-expand-lg bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php" aria-label="Go to home page">
          <img
            src="../image/ninja-.png"
            alt="a cute narutomaki with a headband"
            width="50"
          />
          Narutomaki's backoffice
        </a>
            </div>
    </nav>
<?php echo $message ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu" type="button" role="tab" aria-controls="menu" aria-selected="true">Menu</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Images</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="form-tab" data-bs-toggle="tab" data-bs-target="#form" type="button" role="tab" aria-controls="form" aria-selected="false">Form</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
<table class="table table-bordered mw-100">
        <thead>
            <tr>
                <td>ID</td>
                <td>Category</td>
                <td>Title</td>
                <td>Description</td>
                <td>Price</td>
                <td>Delete/Add</td>
            </tr>
        </thead>
        <tbody>
    <?php 

     $query = "SELECT id, title, description, price, category FROM `menu`";
     $stmt = $conn->prepare($query);
     // EXECUTING THE QUERY
     $stmt->execute();
   
     $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     // FETCHING DATA FROM DATABASE
     $result = $stmt->fetchAll();
     // OUTPUT DATA OF EACH ROW
     foreach ($result as $row) 
     { ?>
        <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['category']?></td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['description']?></td>
        <td><?php echo $row['price']." €"?></td>
        <td class="text-center">
        <form method="post">
          <input type="hidden" name="id" value="<?php echo $row['id']?>">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        </td>
     </tr>
        <?php
     }
    ?>

    <form method="post">
        <tr>
        <td><?php    
        $sql = "SELECT * FROM menu ORDER BY id DESC LIMIT 1";

// Step 3: Execute the query
    $stmt = $conn->prepare($sql);
    $stmt->execute();

// Step 4: Fetch the data
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
     echo $result['id']+1;
        ?></td>
        <td><input class="border-0 w-100" name="category" type="category" id="category"></td>
        <td><input class="border-0 w-100" name="title" type="text" id="title"></td>
        <td><input class="border-0 w-100" name="description" type="text" id="description"></td>
        <td><input class="border-0 w-100" name="price" type="number" id="price"></td>
        <td class="text-center"><input type="submit" class="btn btn-outline-dark" name="add" value="Add"></td>
    </tr>
    </form>
    </tbody>
    </table>
    </div>
    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
    <h4 class="p-2">Add a new image to the restaurant gallery</h4>
    <form method="post" class="pb-4" enctype="multipart/form-data">
    <label for="inputTag" class=" btn btn-outline-dark m-0">
     Select Image
     <input id="inputTag" name="fileToUpload" id="fileToUpload" class="input-file" type="file"/>
    </label>
  <input type="submit" name="submit" value="Upload" class="btn btn-outline-dark">
    </form>
    <table class="table table-bordered mw-100">
        <thead>
            <tr>
                <td>Name</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
    <?php 

     $query = "SELECT img_id, name FROM `images`";
     $stmt = $conn->prepare($query);
     // EXECUTING THE QUERY
     $stmt->execute();
   
     $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     // FETCHING DATA FROM DATABASE
     $result = $stmt->fetchAll();
     // OUTPUT DATA OF EACH ROW
     foreach ($result as $row) 
     { ?>
        <tr>
        <td><?php echo $row['name']?></td>
        <td class="text-center">
        <form method="post">
          <input type="hidden" name="img_id" value="<?php echo $row['img_id']?>">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        </td>
     </tr>
        <?php
     }
    ?>
    </table>

    </div>
    <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
<table class="table table-bordered mw-100">
        <thead>
            <tr>
                <td>First name</td>
                <td>Last name</td>
                <td>Subject</td>
                <td>Message</td>
                <td>Email</td>
                <td>Date</td>
                <td>Hour</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
    <?php 

     $query = "SELECT id, firstName, lastName, email, subject, message, date, hour FROM `form`";
     $stmt = $conn->prepare($query);
     // EXECUTING THE QUERY
     $stmt->execute();
   
     $r = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     // FETCHING DATA FROM DATABASE
     $result = $stmt->fetchAll();
     // OUTPUT DATA OF EACH ROW
     foreach ($result as $row) 
     { ?>
        <tr>
        <td><?php echo $row['firstName']?></td>
        <td><?php echo $row['lastName']?></td>
        <td><?php echo $row['subject']?></td>
        <td><?php echo $row['message']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['date']?></td>
        <td><?php echo $row['hour']?></td>
        <td class="text-center">
        <form method="post">
          <input type="hidden" name="form_id" value="<?php echo $row['id']?>">
          <input type="submit" value="Delete" class="btn btn-danger">
        </form>
        </td>
     </tr>
        <?php
     }
    ?>
    </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="../index.js"></script>
</body>
</html>