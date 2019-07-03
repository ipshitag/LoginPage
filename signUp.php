<html>

<head>
  <meta name ="viewport" content-width = "device-width", initial-scale="1.0"/>
  <link rel="stylesheet" href="signUpCss.css">
</head>

<body>

  <div>
        <?php
        if(isset($_POST['create']))
      {
        echo "User Submitted";
      }

        ?>

    </div>

  <div id="container">

<div class = "row">
    <div class="col-sm-3">
  <form>

  <label for="Name">Name:</label>
    <input type="text" id="name" name="name" required>

    <br>

    <label for="Userame">Username:</label>
      <input type="text" id="username" name="username" required>
    <br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <div id="lower">

  <br>

  <input type="checkbox"><label for="checkbox">Keep me logged in</label>
  <input type="submit" value="Submit" name="create">
  </div><!--/ lower-->
</form>

</div> <!--col sm-->
</div> <!--row-->
</div> <!--container-->

</body>

</html>
