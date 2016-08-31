<?php
  include "../autoload.php";
  @session_start();
?>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" class="ui" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="../assets/css/main.css" media="screen">
      <meta charset="utf-8">
      <title>LBS - LAN | 2016</title>
   </head>
   <body>
    <?php
      if(isset($_SESSION['news-success'])){
        echo $_SESSION['news-success'];
        unset($_SESSION['news-success']);
      }
    ?>

    <div class="admin-panel">
      <div class="content">
        <h1>Welcome to Admin Town</h1>
        <br>
        <a href="userlist.php">Userlist</a>
        <br>
        <a href="tournament.php">Turnerings Lista</a>
        <br>
        <a href="post_news.php">Post News</a>
      </div>
    </div>
   </body>
</html>
