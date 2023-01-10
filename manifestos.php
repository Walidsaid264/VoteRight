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
    <title>Candidates</title>
    <link href="index.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
 <nav class="navbar navbar-expand-lg " style="background-color: #5358C6;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" >
        <img src="images/logo.png" alt="" width="120" height="70">

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <div class="form">
         <p>Hey, <?php echo $_SESSION['fname']; ?>!</p> 
        </div>
          </li>
          <li class="nav-item">
            <a class="nav-link active navlinks" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active navlinks" href="manifestos.php">List of Candidates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active navlinks" aria-current="page" href="contact.php">Contact Us</a>
          </li>
          
          <li class="navoverlay">
          <a class="btn btn-danger active " href="logout.php">Logout</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active navlinks" href="vote.php" >Vote!</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>
<div class="container">
<div  class="btn text-black bg-light  w-35 login">
               Candidates
              </div>
    <?php 
        require("Admin/DB_connect.php");
        $sql="SELECT * FROM candidates ";
        $result=$conn->query($sql);

        if($result !== false && $result->num_rows > 0){
          while($row=$result->fetch_assoc()){
              

       
    ?> 
     
    <div class="container mt-2">
   
    <div class="row">
        <div class="col-md-4">
        
            <div class="card">
              
              <div class="card-body">
                 <br> 

                <b>First Name</b> :- <span class="card-text"><?php echo $row['fname']; ?> </span><br>
                <b>Last Name</b> :- <span class="card-text"><?php echo $row['sname']; ?></span><br>
                <b>Email Name</b> :- <span class="card-text"> <?php echo $row['position']; ?></span><br>
              </div>
            </div>
        </div>
    </div>        
</div>

<?php 
          }
        }else{
          echo"No results";
      }
?>
</div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>