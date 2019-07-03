<?php
require_once('configure.php');
?>

<?php

if(isset($_POST))
{
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (name,username,password) VALUES(?,?,?)";
	$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name, $username, $password]);
		if($result)
    {
			echo 'Successfully saved.';
		}
    else
    {
			echo 'There were erros while saving the data.';
		}
}
  else
  {
	   echo 'No data';
   }
