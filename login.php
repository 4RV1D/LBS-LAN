<?php
//---------------------------------------
  //Autoload Classes, MYSQL & SteamAPI
  include "autoload.php";
//---------------------------------------
  //Register.php code only for this specific page
  include "php/login.php";
//---------------------------------------
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
      <title>LBS - LAN | Logga in</title>
   </head>
   <body>

      <?php

      include "static/header.php";
      include "static/login.php";
      include "static/footer.php";

      ?>

   </body>
</html>
