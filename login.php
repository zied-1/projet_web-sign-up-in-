<?php
$login=0;
$invalid=0;
$null=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connexion.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

     
    $sql="Select * from `registration` where username='$username' and password='$password'";
     $result=mysqli_query($con,$sql);
     if($username==""){
        $null=1;
     }else{
     if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            //echo "Login successful";
            $login=1;

            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        }else{
            $invalid=1;
            //echo 'Invalid data';
        }

     }}

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login Page</title>
  </head>
  <body>
  <?php
        if($invalid || $null){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry</strong> User does not exits!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times;</span></button>
          </div>';
        }
    ?>
    <?php
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> yor are successfully signed in.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times;</span></button>
          </div>';
        }
    ?>



    <h1 class="text-center">Login to website</h1>
   <div class="container mt-1">
   <form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control"  placeholder="Enter your username" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-50  align-items-center">Login</button>
  <div class="container">
        <a href="create.php" class="w-55">Have an account!</a>
    </div>

</form>
   </div>

    </body>
</html>