<?php

@session_start();

if (isset($_SESSION['logged-in'])) {
  unset($_SESSION['logged-in']);
  header('Location: home');
} else {
  header('Location: home');
}

?>
