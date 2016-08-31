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
        <h1>Welcome to Admin Town 123</h1>
        <br>
        <a href="index.php">Go back</a>
        <br>

        <?php

        // Connect to the Database to get the Profile informaton
        $sql = "SELECT USERid, FirstName, LastName, Username, Email, TableNum, Phone FROM users ORDER BY USERid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {

            echo "<ul><li>";
              echo "<p>" . $row['USERid'] . "</p><hr>";
              echo "<p>" . $row['FirstName'] . "</p>";
              echo "<p>" . $row['LastName'] . "</p>";
              echo "<p>" . $row['Username'] . "</p>";
              echo "<p>" . $row['Email'] . "</p><hr>";
              echo "<p>" . $row['TableNum'] . "</p><hr>";
              echo "<p>" . $row['Phone'] . "</p>";
            echo "</li></ul>";
          }
        } else {
          echo "Fuck.. Error, RIP userlist";
        }

        ?>
      </div>
    </div>
   </body>
</html>
