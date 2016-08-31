<?php
  @session_start();
  include "autoload.php";

  if(isset($_SESSION['logged-in'])){
    header('Location: home-loggedin');
  }
?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" class="ui" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="assets/css/main.css" media="screen">
      <meta charset="utf-8">
      <title>LBS - LAN | 2016</title>
   </head>
   <body>

      <?php
      if(isset($_SESSION['register-success'])){
        echo $_SESSION['register-success'];
        unset($_SESSION['register-success']);
      }
        include "static/home.php";
      ?>

   </body>
</html>
