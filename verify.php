<?php

$con=mysqli_connect("localhost","root","","useraccounts");
if(isset($_POST))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = sha1($password);
  
  $result = mysqli_query($con,"select * from users where username='$username' and password ='$password'") 
or die("Failed to connect to database".mysql_error());

if($row=mysqli_fetch_assoc($result))
{
echo "Login successfull";
}
else
{
echo "Failed";
}
}
?>
