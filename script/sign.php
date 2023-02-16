<?php
  require_once 'vendor/autoload.php';
  $recaptcha = new \ReCaptcha\ReCaptcha('6LfIzYkkAAAAAFsX3kyCVCBrYErlOJTL-7F4kGZ_');
  
  $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
  $success=0;
  $user=0;
  session_start();

  if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
   
    if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*])(?=.{8,30})/", $password)) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oh no !</strong> Your password should contain at least 8 characters, a number and a special character !
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
      if ($resp->isSuccess()){
        $stmt = $con->prepare("SELECT * FROM `registration` WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result= $stmt->get_result();
        if($result){
          $num=mysqli_num_rows($result);
          if($num>0){
            $user=1;
          }else{
            $stmt = $con->prepare("SELECT * FROM `registration` WHERE username=? AND password=?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            if($result){
              //echo "Signup successful";
              $success=1;
            }else{
              die(mysqli_error($con));
            }
          }
        }
        $stmt->close();
        $con->close();
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oh no !</strong> You need to verify the captcha !
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }  
    }  
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

    <?php

      if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh no, sorry !</strong> User already exist
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }

    ?>

    <?php

      if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> You are successfully signed up.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

    ?>

    <div class="monlogo">
       <img src="<?php 
       $logoUrl="logo.png";
       echo htmlspecialchars($logoUrl); ?>" class="rounded mx-auto d-block">
     </div>
    <h1 class="text-center"> Sign up page </h1>
    <div class="container mt-5">
      <form action="sign.php" method="post">

        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input type="text" class="form-control" placeholder="Enter your username" name="username">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Enter your password" name="password">
          <div id="passwordHelpBlock" class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </div>

        <div>
          <button type="submit" class="btn btn-primary w-100">Sign up</button>
          <button type="reset" class="btn btn-primary w-100 mt-1" ><a href="sign.php" style="text-decoration: none; color: inherit; "> Reset </a></button>
          <button type="button" class="btn btn-primary w-100 mt-1" ><a href="login.php" style="text-decoration: none; color: inherit; "> already registred </a></button>
        </div>

        <div class="g-recaptcha" data-sitekey="6LfIzYkkAAAAANE58XsdMoTRcNgS7Xp8c6cBJ5lv" name="g-recaptcha-response"></div>

      </form>
    </div>    
  </body>
</html>