<?php
//---------------------------------------
  //Autoload Classes, MYSQL & SteamAPI
  include "autoload.php";
//---------------------------------------

@session_start();

if(!isset($_SESSION['logged-in'])){
  header('Location: home');
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
      <title>LBS - LAN | Turneringar</title>
   </head>
   <body>

      <?php

      include "static-loggedin/header.php";
      include "static-loggedin/tournament.php";
      include "static-loggedin/footer.php";

      ?>

   </body>
</html>
