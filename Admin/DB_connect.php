
<?php  

$sname="Localhost";
$uname="root";
$password="";
$db_name="online_voting";

$conn = mysqli_connect($sname,$uname,$password,$db_name , "3307");

if(!$conn){
    echo " Connection failed. ";
    
}else {
    //echo" Connected. ";
    
}



?>