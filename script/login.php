<?php
  // Désactiver la résolution des entités externes
  $options = LIBXML_NONET;
  $doc = new DOMDocument();
  $doc->loadXML($xml, $options);
    $login=0;
    $invalid=0;
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username = mysqli_real_escape_string($con, $_POST["username"]);
        $password = mysqli_real_escape_string($con, $_POST["password"]);
        $stmt = $con->prepare("SELECT * FROM `registration` WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $result= $stmt->get_result();

        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                $login=1;
                session_start();
                $_SESSION['username']=$username;
                header('location:home.php');
            }else{
                $invalid=1;
            }
        }
    }
    

?>

<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

        <?php

            if($invalid){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oh no !</strong> this user does not exist, you can <a href="sign.php"> sign up </a> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }

        ?>

        <?php

            if($login){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong> You are successfully logged in.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }

        ?>
        <div class="monlogo">
            <img src="logo.png" class="rounded mx-auto d-block">
        </div>
        <h1 class="text-center"> Login to our website </h1>
        <div class="container mt-5">
            <form action="login.php" method="post">
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
                <button type="submit" class="btn btn-primary w-100 mt-1" >Login</button>
                <button type="submit" class="btn btn-primary w-100 mt-1" ><a href="sign.php" style="text-decoration: none; color: inherit; "> Sign up </a></button>
                <button type="reset" class="btn btn-primary w-100 mt-1" ><a href="login.php" style="text-decoration: none; color: inherit; "> Reset </a></button>
            </form>
        </div>    
  </body>
</html>