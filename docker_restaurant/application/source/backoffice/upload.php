<?php
include '../includes/connectMenuDB.php';

$message = "";
if (isset($_FILES["fileToUpload"])) {
if( $_FILES["fileToUpload"]["name"]==NULL){
  $message=     
  "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
  "<div class='modal-content'>".
    "<div class='modal-header'>".
      "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
      "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
        "<span aria-hidden='true'>&times;</span>".
      "</button>".
    "</div>".
    "<div class='modal-body'>".
      "You must choose a file".
    "</div>".
  "</div>".
"</div>";
  return;
}
$target_dir = "../caroussel-img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])AND !empty($_FILES['file']['tmp_name'])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $message="<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
    "<div class='modal-content'>".
      "<div class='modal-header'>".
        "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
          "<span aria-hidden='true'>&times;</span>".
        "</button>".
      "</div>".
      "<div class='modal-body'>".
      "File is not an image.".
      "</div>".
    "</div>".
  "</div>";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
    $message= "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
    "<div class='modal-content'>".
      "<div class='modal-header'>".
        "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
          "<span aria-hidden='true'>&times;</span>".
        "</button>".
      "</div>".
      "<div class='modal-body'>".
      "Sorry, file already exists.".
      "</div>".
    "</div>".
  "</div>";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message=   "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
    "<div class='modal-content'>".
      "<div class='modal-header'>".
        "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
          "<span aria-hidden='true'>&times;</span>".
        "</button>".
      "</div>".
      "<div class='modal-body'>".
      "Sorry, your file is too large.".
      "</div>".
    "</div>".
  "</div>";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "webp" ) {
    $message= "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
    "<div class='modal-content'>".
      "<div class='modal-header'>".
        "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
          "<span aria-hidden='true'>&times;</span>".
        "</button>".
      "</div>".
      "<div class='modal-body'>".
      "Sorry, only JPG, JPEG, PNG & webp files are allowed.".
      "</div>".
    "</div>".
  "</div>";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0 AND $message=="") {
    $message= "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
    "<div class='modal-content'>".
      "<div class='modal-header'>".
        "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
          "<span aria-hidden='true'>&times;</span>".
        "</button>".
      "</div>".
      "<div class='modal-body'>".
      "Sorry, your file was not uploaded.".
      "</div>".
    "</div>".
  "</div>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $message= "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
      "<div class='modal-content'>".
        "<div class='modal-header'>".
          "<h5 class='modal-title' id='ModalLabel'>Success</h5>".
          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
            "<span aria-hidden='true'>&times;</span>".
          "</button>".
        "</div>".
        "<div class='modal-body'>".
        "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.".
        "</div>".
      "</div>".
    "</div>";
    } else {
      $message= "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
      "<div class='modal-content'>".
        "<div class='modal-header'>".
          "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
          "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
            "<span aria-hidden='true'>&times;</span>".
          "</button>".
        "</div>".
        "<div class='modal-body'>".
        "Sorry, there was an error uploading your file.".
        "</div>".
      "</div>".
    "</div>";
    }

    $image= $_FILES["fileToUpload"]["name"];
    
    // Insert the image information into the database
    $stmt = $conn->prepare("INSERT INTO images (name, path) 
    VALUES (:name, :path)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':path', $path);

// insert a row
$name = $image;
$path = $target_file;

$stmt->execute();}
  }
?>