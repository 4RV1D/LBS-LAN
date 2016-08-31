<?php
  @session_start();

  if(isset($_SESSION['register-fail'])){
    echo $_SESSION['register-fail'];
    unset($_SESSION['register-fail']);
  }


  if (isset($_POST['register']) && isset($_FILES['image'])) {

    $FirstName  = $_POST['first-name'];
    $LastName   = $_POST['last-name'];
    $Phone      = $_POST['phone'];
    $Email      = $_POST['email'];

    $Username   = $_POST['username'];
    $MainGame   = $_POST['main-game'];
    $Password   = $_POST['password'];
    $PasswordC  = $_POST['password-confirm'];

    $image = $_FILES['image'];

    // Start a new session for the Register Class
    $Register = new Register();

    //Upload image to imgur
    $imgur_url = $Register->imgur($image);

    //Check for form input and password confirmation.
    $Register->formInputConfirmation($FirstName, $LastName, $Email, $Phone, $Username, $MainGame, $Password, $PasswordC);
    $Register->passwordconfirmation($Password, $PasswordC);

    //Encrypt password (md5)
    $encryptedPassword = $Register->md5password($Password);

    // Checking the Mysql connection
    $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

    // Insert information into database
    $Register->createUser($FirstName, $LastName, $Username, $encryptedPassword, $Email, $MainGame, $imgur_url, $Phone);

  }
?>
