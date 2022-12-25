<?php
$success=0;
$user=0;
$null=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connexion.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpasswoed'];
   // $sql="insert into `registration`(username,password) values('$username','$password')";
    //$result=mysqli_query($con,$sql);

    //if($result){
      //  echo "Data inseted correctly";
    //}else{
      //  die(mysqli_error($con));
    //}

    $sql="Select * from `registration` where username='$username'";
    $result=mysqli_query($con,$sql);
    if($username==""){
        $null=1;
    }else{
     if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            //echo "user already exist";
            $user=1;
        }else{
            if($password===$cpassword){
            $sql="insert into `registration`(username,password) values('$username','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
                //echo "Signup Successfully";
                $success=1;
                header('location:login.php');}
            }else{
             $invalid=1;
    }
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

    <title>sign_up</title>
  </head>
  <body>
    <?php
        if($user || $null){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Name or password are not valid.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times;</span></button>
          </div>';
        }
    ?>

<?php
        if($invalid){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid credentials</strong> passwords doesnt match!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times;</span></button>
          </div>';
        }
    ?>


<?php
        if($success){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> yor are successfully signed up.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times;</span></button>
          </div>';
        }
    ?>


<h1 class="text-center">Sign up page</h1>
<div class="container mt-5">
   <form action="signup.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control"  placeholder="Enter your username" name="username">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="cpassword">
  </div>


  <button type="submit" class="btn btn-primary w-50">Sign Up</button>
</form>
   </div>

    </body>
</html>