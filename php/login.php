<?php

@session_start();

if(isset($_SESSION['login-fail'])){
  echo $_SESSION['login-fail'];
  unset($_SESSION['login-fail']);
}

if (isset($_POST['login'])) {

  $Username   = $_POST['username'];
  $Password   = $_POST['password'];

  $Login = new Login();

  $Login->form_check($Username, $Password);
  $encryptedPassword = $Login->md5password($Password);

  // Checking the Mysql connection
  $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  $Login->login_db_connect($Username, $encryptedPassword);
}

?>
