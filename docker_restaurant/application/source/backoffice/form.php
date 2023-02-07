<?php
include './includes/connectMenuDB.php';
date_default_timezone_set('Europe/Brussels');
$message="";
if(isset($_POST['email']) AND isset($_POST['message']) AND isset($_POST['firstName']) AND isset($_POST['lastName'])){

// we initiate an array that will contain any potential errors.
$errors = array();
// 1. Sanitisation
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);

$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);

$subject = $_POST['subject'];

// 2. Validation
if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $errors['email'] = "This address is invalid.";
}
if(strlen($message)<5){
  $errors['message'] = "Please write something. We cannot read your mind (yet).";
}
if(strlen($firstName)<1){
  $errors['firstName']="Please enter your name.";
}
if(strlen($lastName)<1){
  $errors['lastName']="Please enter your last name.";
}

// 3. execution
if (count($errors) > 0) {

  $errorMessage = implode("<br>", $errors);
  echo 
    "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
         "<div class='modal-content'>".
           "<div class='modal-header'>".
             "<h5 class='modal-title' id='ModalLabel'>Error</h5>".
             "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
               "<span aria-hidden='true'>&times;</span>".
             "</button>".
           "</div>".
           "<div class='modal-body'>".
             $errorMessage.
           "</div>".
         "</div>".
       "</div>";
  return;
}




// prepare sql and bind parameters
$stmt = $conn->prepare("INSERT INTO form (email, message, firstName, lastName, subject, date, hour) 
                        VALUES (:email, :message, :firstName, :lastName, :subject, :date, :hour)");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':message', $message);
$stmt->bindParam(':lastName', $lastName);
$stmt->bindParam(':firstName', $firstName);
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':hour', $hour);

// insert a row
$email = $_POST["email"];
$message = $_POST["message"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$subject = $_POST["subject"];
$hour= date("his");
$date= date("Y-m-d");

$stmt->execute();

$response=(
 "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
  "<div class='modal-content'>".
   "<div class='modal-header'>".
     " <h5 class='modal-title' id='ModalLabel'>Your message has been sent !</h5>".
      "<button type='button' class='close' data-dismiss='modal' aria-label='close'>".
        "<span aria-hidden='true'>&times</span>".
      "</button></div>".
    "<div class='modal-body'>".
    "We'll get back to you ASAP".
  "</div></div></div>");
  echo $response;
}
?>