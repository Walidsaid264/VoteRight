<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="index.css" rel="stylesheet">
<title>Document</title>
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg " style="background-color: #5358C6;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" >
        <img src="../images/strath-logo.png" alt="" width="120" height="70">

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <div class="form">
         <p>Hey, <?php echo $_SESSION['username']; ?>!</p> 
        </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active navlinks" aria-current="page" href="Register_Admin.php">Register Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active navlinks" href="Register_candidates.php">Register Candidates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active navlinks" aria-current="page" href="Register_voters.php">Register Voters</a>
          </li>
          
          
          <li class="navoverlay ">
            <a class="btn btn-danger active" href="admin_logout.php" >Log Out</a>
          </li>
          
        </ul>
        
      </div>
    </div>
    </nav>
<div class="row" style="height: 616px;">
  <div class="col-sm-2 vertical" >
    <nav class ="navbar ">
      <ul class ="nav navbar-nav">
        <li class ="nav-item">
         <a class ="nav-link active navlinks" href="dashboard.php"> Dashboard </a>
        </li>
        <li class ="nav-item">
        <a class ="nav-link active navlinks" href="Edit_Candidates.php"> Edit Candidates </a>
        </li>
        <li class ="nav-item">
        <a class ="nav-link active navlinks" href="Edit_Voters.php"> Edit Voters </a>
        </li>
        <li class ="nav-item">
        <a class ="nav-link active navlinks" href="View_Users.php">View Participants </a>
        </li>
        <li class ="nav-item">
         <a class ="nav-link active navlinks" href="start.php"> Publish Results </a>
        </li>
        
        <li class ="nav-item ">
        <a class ="nav-link active navlinks" href="#"> Manage Election </a>
        </li>
      </ul>
    </nav>
  </div>
<!-- Register Form Area -->
<!-- phpcode -->
<?php
    require('DB_connect.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `admin` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            // echo "<div class='form'>
            //       <h3>Admin registered successfully.</h3><br/>
            //       </div>";
            header('Location: Register_Admin.php');
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Try  again.</p>
                  </div>";
        }
    } else {
?>
<!-- html -->

            <div class="col-md-3 offset-2 justify-content-center align-items-center" style="margin-top: 60px;">
                <div class="login-form ">
                    <form name="login"  action="" method="post" class="m-3">
                        <h3>Register Admin</h3>
                        <div class="form-group">
                            <label>Username</label> <input type="text"
                                class="form-control mt-1 mb-3"
                                placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label> <input type="email"
                                class="form-control mt-1 mb-3"
                                placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group  mb-3">
                            <label>Password</label> <input type="password"
                                class="form-control mt-1"
                                placeholder="Password" name="password">
                        </div>
                        <input type="submit"
                            class="btn text-white bg-dark  w-50 login"
                            value="Register" name="submit">
                      
                  </form>
               </div>
            </div>

<?php

    }

?>
    
</div>
        
  

    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
