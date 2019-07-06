<?php
 require_once('configure.php');
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name ="viewport" content-width = "device-width", initial-scale="1.0"/>
  <link rel="stylesheet" href="signUpCss.css">
</head>

<body>

  <div>
        <?php

        ?>

    </div>
    <center><h1> Registrations</h1></center>

  <div id="container">

<div class = "row">
    <div class="col-sm-3">

  <form action = "signUp.php" method = "post">

  <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <br>

    <label for="userame">Username:</label>
      <input type="text" id="username" name="username" required>
    <br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <div id="lower">

  <br>

  <input type="checkbox"><label for="checkbox">Keep me logged in</label>
  <input type="submit" value="Submit" name="create" id = "register">
  </div><!--/ lower-->
</form>

</div> <!--col sm-->
</div> <!--row-->
</div> <!--container-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type = "text/javascript">
  $(function()
{
  $('#register').click(function (e)
  {

    var valid = this.form.checkValidity();
    if(valid)
    {
      var name = $('#name').val();
      var username =   $('#username').val();
      var password =  $('#password').val();
      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: 'process.php',
        data: {name: name, username: username, password: password},
        success: function(data)
        {
          Swal.fire({
          title: data,
          width: 600,
          padding: '3em',
          background: '#fff url(bg.jpg)',
          backdrop: `
            rgba(0,0,123,0.4)
            url("nyancat.gif")
            center left
            no-repeat
          `
        }) .then(function()
        {
          window.location = "index.html";
        })
        },
        error: function(data)
        {
          Swal.fire({
          title: 'Error!',
          width: 600,
          padding: '3em',
          background: '#fff url(bg.jpg)',
          backdrop: `
            rgba(0,0,123,0.4)
            url("caterr.gif")
            center left
            no-repeat
          `
        })

        }
      });

    }

  });


});
</script>

</body>

</html>
