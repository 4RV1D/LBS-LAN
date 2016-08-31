<?php
  @session_start();
  if(isset($_SESSION['profile-fail'])){
    echo $_SESSION['profile-fail'];
    unset($_SESSION['profile-fail']);
  }
?>
