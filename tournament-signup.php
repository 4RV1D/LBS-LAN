<?php

  include "php/classes.php";

  $GameID = htmlspecialchars($_GET["gameid"]);

  $Tournament = new Tournament();
  $Tournament->tournament_signup($GameID, $_SESSION['logged-in']);
