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
        <span class="navbar-toggler-icon"> </span>
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
            <a class=" btn btn-danger active" href="admin_logout.php" >Log Out</a>
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
    <!-- Send email to voters -->
    
    <div class="col-sm-8 offset-1 bg-light"style="height: 400px; border-radius:10px; margin-top:30px; border:1px solid gray;" >
    <br><label class="btn text-black bg-light  w-50 login">Send credentials to Voters</label><br>
    <form action="" method="post" class="m-3">
        <div class="form-group">
              <label>Subject of email:</label> <input type="text"
              class="form-control mt-1 mb-3"
               placeholder="" name="subject" id="subject">
        </div>
        <div class="form-group">
              <label>Body of email:</label> <textarea 
              class="form-control mt-1 mb-3"
              placeholder="Body" name="body" id="body" rows="5" cols="25">Kindly find your logging in credentials below to be used when voting.
              </textarea>
        </div>
      <input type="submit" name=submit value="Send" class="btn text-white bg-dark  w-50 login"/>
    </form>
    </div>
    <?php
    require('DB_connect.php');
    if (isset($_REQUEST['fname'])) {

    $from='walidsaid264@gmail.com';
    $subject=$_POST['subject'];
    $body= $_POST['body'];

    $query= "SELECT * FROM voter";
    $result= mysqli_query ($conn, $query);
    //or die ('Error querying database.');

    while ($row = mysqli_fetch_array($result)) {
      $first_name= $row['fname'];
      $last_name= $row['sname'];
      $email= $row['email'];
      $password=$row['password'];

      $msg= "Dear $first_name $last_name,\n$body";
      mail($email, $subject, $msg, 'From:' . $from);
      //echo 'Email sent to: ' . $email. '<br>';
}
    }
    ?>

  </div>
        

    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
