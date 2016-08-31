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

        <?php

        // Connect to the Database to get the Profile informaton

        $sql = "SELECT users.USERid, users.FirstName, users.LastName, users.Username, tournaments.Game, tournaments.USERid
        FROM users RIGHT OUTER JOIN tournaments
        ON tournaments.USERid = users.USERid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {

            $Game = "Default";
            if ($row['Game'] == "1") {$Game = "League Of Legends";}
            if ($row['Game'] == "2") {$Game = "CSGO";}
            if ($row['Game'] == "3") {$Game = "Hearthstone";}

            echo "<ul>";
              echo "<li> " . $row['FirstName'] . " " . $row['LastName'] . " | " . $row['Username'] . " | " . $Game . "</li>";
            echo "</ul>";

          }
        } else {
          echo "Fuck.. Error, RIP";
        }

        ?>
      </div>
    </div>
   </body>
</html>
