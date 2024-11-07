<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test-login";
//create connection
$conn = new mysqli($servername,$username,$password,$dbname);
//check connection
if($conn ->connect_error){
    die ("conection error".$conn->connect_error);
}else{
    // echo "suusscessfull connection";
}




?>