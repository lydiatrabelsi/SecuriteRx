<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="select * from `registration` where username='$username' and password='$password'";

        $result=mysqli_query($con,$sql);

        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                echo "Login successful";
            }else{
                echo "Invalid data";
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
                <button type="submit" class="btn btn-primary w-100" >Login</button>
            </form>
        </div>    
  </body>
</html>