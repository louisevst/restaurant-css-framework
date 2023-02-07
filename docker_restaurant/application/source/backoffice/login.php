<?php 
include '../includes/ConnectMenuDB.php';
if(isset($_POST['signIn'])){
        $stmt = $conn->prepare(" SELECT * FROM `login`");
        $stmt->execute();
        $item = $stmt->fetch();
    
        $username=filter_var($_POST['userName'], FILTER_SANITIZE_STRING);
        $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if($username==$item['userName']AND $password==$item['login']){
            header("Location: backoffice.php");
        }
        else{ echo
            "<div id='modal' class='modal-dialog position-fixed w-100 shadow' role='document'>".
        "<div class='modal-content'>".
          "<div class='modal-header'>".
            "<h5 class='modal-title' id='ModalLabel'>Error !</h5>".
            "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
              "<span aria-hidden='true'>&times;</span>".
            "</button>".
          "</div>".
          "<div class='modal-body'>".
            "You must enter the correct password and user name to login.<br>
            Dante, you can use username: boss and password: loveramen".
          "</div>".
        "</div>".
      "</div>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="backend.css">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

</head>
<body>
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
<main class="container-fluid d-flex align-items-center justify-content-center">
<form method="post" class="col-10 col-md-4 m-0 p-4 border">
    
  <div class="form-outline mb-4">
    <input type="userName" id="form2Example1" class="form-control" name="userName"/>
    <label class="form-label" for="form2Example1">User name</label>
  </div>

  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="password"/>
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <button type="submit" class="btn btn-primary btn-block mb-4" name="signIn">Sign in</button>
</form>
</main>
<script src="../index.js"></script>
</body>
</html>