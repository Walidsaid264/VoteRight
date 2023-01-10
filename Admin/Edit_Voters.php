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
        <img src="../images/logo.png" alt="" width="120" height="70">
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
            <a class=" btn btn-danger active" href="admin_logout.php" >Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    
  <div class="row "style="height: 600px;" >
  <div class="col-sm-2 vertical " >
          <nav class ="navbar  ">
            <ul class ="nav navbar-nav">
            <li class ="nav-item ">
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
    <div class="col-sm-10 " >
    <div class="container">
<div  class="btn  w-35 login">Voters</div>
    <?php 
        require("DB_connect.php");
        $sql="SELECT * FROM voter ";
        $result=$conn->query($sql);

        if($result !== false && $result->num_rows > 0){
          while($row=$result->fetch_assoc()){
              

       
    ?> 
     
    <div class="container mt-2">
   
    <div class="row">
        <div class="col-md-5">
        
            <div class="card">
              
              <div class="card-body">
                 <br> 
                 <b>Candidate ID</b> :-<span class="card-text"><?php echo $row['school_id']; ?> </span><br>
                <b>First Name</b> :- <span class="card-text"><?php echo $row['fname']; ?> </span><br>
                <b>Last Name</b> :- <span class="card-text"><?php echo $row['sname']; ?></span><br>
                <b>Email </b> :- <span class="card-text"> <?php echo $row['email']; ?></span><br>
                  
              </div>
            </div>
        </div>
    </div>        
</div>
<div class="col-sm-5 " >
    <div class="container">
    <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     
                     <tr>
                        <td width = "100">School ID</td>
                        <td><input name = "emp_id" type = "text" 
                           id = "emp_id"></td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete"class="btn btn-danger active">
                        </td>
                     </tr>
                     
                  </table>
               </form>


    </div>
</div>
<?php 
          }
        }else{
          echo"No results";
      }
?>
</div>
  </div>

    </div>

    
  <?php
  if (isset($_POST['delete'])) {
             $emp_id = $_POST['emp_id'];
            
            $sql = "DELETE FROM voter WHERE school_id = $emp_id" ;
            $results =$conn->query($sql);
            
            if(! $results ) {
               die('Could not delete data');
            } else {
               header('Location: Edit_Voters.php');
    }
            
  }


  ?>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
