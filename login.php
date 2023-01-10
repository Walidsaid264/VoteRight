<?php
include 'Admin/DB_connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="Stylesheet" href="index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>LOG IN</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg " style="background-color: #5358C6;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" >
            <img src="images/strath-logo.png" alt="" width="120" height="70">
          </a>          
        </div>
      </nav>
    <!-- Login Form -->
    <!-- PHP -->
    <?php
    require('Admin/DB_connect.php');
    session_start();
    if (isset($_POST['email'])) {
        $fname = stripslashes($_REQUEST['fname']);    
        $fname = mysqli_real_escape_string($conn, $fname);
        $email = stripslashes($_REQUEST['email']);    
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query    = "SELECT * FROM `voter` WHERE fname ='$fname'AND email='$email'
                     AND password='$password'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['fname'] = $fname;
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <!-- HTML -->
    <div class="main">
        <div
            class="d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-6 " style="margin-top: 60px;">
                <div class="login-form ">
                    <form name="login" action="" method="post" class="m-3">
                        <h3> Voter LOGIN</h3>
                        <div class="form-group">
                            <label>Name</label> <input type="text"
                                class="form-control mt-1 mb-3"
                                placeholder="Name" name="fname" >
                        </div>

                        <div class="form-group">
                            <label>School Email</label> <input type="email"
                                class="form-control mt-1 mb-3"
                                placeholder="Email" name="email" >
                        </div>
                        <div class="form-group  mb-3">
                            <label>Password</label> <input type="text"
                                class="form-control mt-1"
                                placeholder="Password" name="password">
                        </div>
                        <input type="submit"
                            class="btn text-white bg-dark  w-25 login"
                            value="Login" name="submit">
                      
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-12" style=" background-color: black; margin: 50px 0px 0px 0px; color: #ffffff;">
                <p class="text-center">Copyright@2022-Strathmore University</p>
            </div>
        </div>
    </div>

<?php

    }
?>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>