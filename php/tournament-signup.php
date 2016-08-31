<?php
  $GameID = htmlspecialchars($_GET["gameid"]);

  $Tournament = new Tournament();
  $Torunament->tournament_signup($GameID);
?>
