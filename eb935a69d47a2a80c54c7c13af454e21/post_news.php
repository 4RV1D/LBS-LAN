<?php
  include "../autoload.php";
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
    <div class="admin-panel">
      <div class="content">
        <h1>Welcome to Admin Town</h1>
        <br>
        <a href="index.php">Go back</a>
        <br>

        <p>
          PS: Finns inget system för att redigera så see till att fylla i allt och ha rätt stavning.
        </p>
        <form class="news-form" action="admin.php" method="post">
          <i class="fa fa-user" aria-hidden="true"></i><input type="text" name="name" value="" placeholder="Your Name"><br><br>
          <i class="fa fa-list" aria-hidden="true"></i><input type="text" name="title" value="" placeholder="Title"><br><br>
          <textarea rows="4" cols="50" name="text" placeholder="News Content"></textarea><br>
          <button type="submit" name="post_news">Post News</button>
        </form>

      </div>
    </div>
   </body>
</html>
