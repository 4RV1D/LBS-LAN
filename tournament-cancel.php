<?php

  include "php/classes.php";

  $GameID = htmlspecialchars($_GET["gameid"]);

  $Tournament = new Tournament();
  $Tournament->tournament_cancel($GameID, $_SESSION['logged-in']);
