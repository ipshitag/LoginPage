<?php
require_once('configure.php');
?>

<?php

session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'useraccounts';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (empty($_POST["username"]) && empty($_POST["password"]) )
{
	echo ('Please fill both the username and password field!');
}


if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?'))
{
	// Bind parameters (s = string)
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

  if($stmt->num_rows > 0)
  {
    $stmt->bind_result($id,$password);
    $stmt->fetch();

    if($_POST['password'] === $password)
    {
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      header( 'Location: index.html' );
    }
    else
     {
      echo "Incorrect Username or Password";
     }
   }
     else
     {
       echo 'Incorrect Username or Password';
     }

     $stmt->close();
}
