<?php
include "../autoload.php";

if (isset($_POST['post_news'])) {

  $name     = $_POST['name'];
  $title    = $_POST['title'];
  $text     = $_POST['text'];

  $News = new News();
  $News->post_news($title, $text, $name);

}

?>
