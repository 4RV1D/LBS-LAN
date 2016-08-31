<?php
  @session_start();

  /**
   * Register class all functions for the register page.
   */
  class Register {

    // Imgur Uploading
    function imgur($img) {
      $filename = $img['tmp_name'];
      $client_id = "1f8efdcdde18b9c";
      $handle = fopen($filename, "r");
      $data = fread($handle, filesize($filename));
      $pvars   = array('image' => base64_encode($data));
      $timeout = 30;

      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
      $out = curl_exec($curl);

      curl_close($curl);
      $pms = json_decode($out, true);
      $url = $pms['data']['link'];

      if ($url = "") {
        $_SESSION['register-fail'] = "<h3 class='header_popup'>Kunde inte ladda upp bilden.</h3>";
        header("Location: register");
        die();
      } else {
        return $pms['data']['link'];
      }
    }

    // Form Input confirmation, Have they entered all the fields
    function formInputConfirmation($FirstName, $LastName, $Email, $Phone, $Username, $MainGame, $Password, $PasswordC) {
      if (empty($FirstName) || empty($LastName) || empty($Email) || empty($Phone) || empty($Username) || empty($MainGame) || empty($Password) || empty($PasswordC)) {
        $_SESSION['register-fail'] = "<h3 class='header_popup'>Du måste Fylla i alla Formulär</h3>";
        header("Location: register");
        die();
      }
    }

    // Password Confirmation
    function passwordconfirmation($password, $passwordconfirm) {
      if ($password != $passwordconfirm) {
        $_SESSION['register-fail'] = "<h3 class='header_popup'>Dina Lösenord mathar inte!</h3>";
        header("Location: register");
        die();
      }
    }

    // Encrypt Password with a MD5 String
    function md5password($password) {
      $encryptedPassword = md5($password);
      return $encryptedPassword;
    }

    // Create a user for the MYSQL Database
    function createUser($FirstName, $LastName, $Username, $Password, $Email, $MainGame, $url, $Phone) {

      // Include MYSQL for SQL command.
      include "mysql.php";

      //Check if the user already exists
      $sql = "SELECT Username FROM users WHERE Username='$Username'";

      if ($result = mysqli_query($conn,$sql)) {
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);
        if ($rowcount != 0) {
          $_SESSION['register-fail'] = "<h3 class='header_popup'>Ditt Användarnamn Används redan.</h3>";
          header("Location: register");
          die();

        } else {

          //Encrypt the Username and Names so they can't do XSS exploits and troll things.
          $FirstName_NoHTML = htmlspecialchars($FirstName, ENT_QUOTES, 'UTF-8');
          $LastName_NoHTML = htmlspecialchars($LastName, ENT_QUOTES, 'UTF-8');
          $Username_NoHTML = htmlspecialchars($Username, ENT_QUOTES, 'UTF-8');
          $MainGame_NoHTML = htmlspecialchars($MainGame, ENT_QUOTES, 'UTF-8');

          //Insert Register Data into database Users
          $sql = "INSERT INTO users (FirstName, LastName, Username, Password, Email, MainGame, ProfilePic, Phone)
                  VALUES ('$FirstName_NoHTML', '$LastName_NoHTML', '$Username_NoHTML', '$Password', '$Email', '$MainGame_NoHTML', '$url', '$Phone')";

          if ($conn->query($sql) === TRUE) {
              $_SESSION['register-success'] = "<h3 class='header_popup'>Du har Registrerat dig, Du kan nu Logga in</h3>";
              header("Location: home");
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

        }
      }
    }
  }

  /**
   * Login functions
   */
  class Login {

    // Have the user entered both Username And Password
    function form_check($Username, $Password) {
      if (empty($Username) || empty($Password)) {
        $_SESSION['login-fail'] = "<h3 class='header_popup'>Du måste Fylla i både Användarnamn och Lösenord</h3>";
        header("Location: login");
        die();
      }
    }

    // Encrypt Password with a MD5 String so it matches the one in DB
    function md5password($Password) {
      $encryptedPassword = md5($Password);
      return $encryptedPassword;
    }

    // Connect to DB and check the username and password
    function login_db_connect($Username, $Password) {

      // Include MYSQL for SQL command.
      include "mysql.php";

      // Connect to the Database to get the User ID, Username and Password
      $sql = "SELECT USERid, Username, Password FROM users WHERE Username='$Username'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          // Check if the password matches the one in DB
          if ($row["Password"] == $Password) {
            $_SESSION['logged-in'] = $row["USERid"];

            $_SESSION['login-fail'] = "<h3 class='header_popup'>Du måste Fylla i både Användarnamn och Lösenord</h3>";
            header("Location: home");
            die();

          } else {
            $_SESSION['login-fail'] = "<h3 class='header_popup'>Ditt lösenord var fel</h3>";
            header("Location: login");
            die();
          }
        }

      } else {
        $_SESSION['login-fail'] = "<h3 class='header_popup'>Ditt användarnamn finns inte</h3>";
        header("Location: login");
        die();
      }

    }
  }

  /**
   * Profile functions
   */
  class Profile {

    // Connect to DB
    public function db_get_information($USERid) {

      // Include MYSQL for SQL command.
      include "mysql.php";

      // Connect to the Database to get the Profile informaton
      $sql = "SELECT USERid, FirstName, LastName, Username, MainGame, ProfilePic, TableNum FROM users WHERE USERid='$USERid'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          echo "<div class='profile_picture'>";
            echo "<img src='" . $row['ProfilePic'] . "'>";
          echo "</div>";

          echo "<div class='profile_info'>";
            echo "<h1>" . $row['Username'] . "</h1>";
            echo "<p><strong>Namn: </strong>" . $row['FirstName'] . " " . $row['LastName'] . "</p>";
            echo "<p><strong>Main Spel: </strong>" . $row['MainGame'] . "</p>";
            echo "<p><strong>Plats: </strong>" . $row['TableNum'] . "</p>";
          echo "</div>";
        }
      } else {
        $_SESSION['profile-fail'] = "<h3 class='header_popup'>Ingen profil hittades</h3>";
        header("Location: profile");
        die();
      }

    }
  }

  class PrivateProfile {

    // Connect to DB
    public function db_get_information($USERid) {

      // Include MYSQL for SQL command.
      include "mysql.php";

      // Connect to the Database to get the Profile informaton
      $sql = "SELECT USERid, FirstName, LastName, Username, MainGame, ProfilePic, TableNum FROM users WHERE USERid='$USERid'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          echo "<div class='profile_picture'>";
            echo "<img src='" . $row['ProfilePic'] . "'>";
          echo "</div>";

          echo "<div class='profile_info'>";
            echo "<h1>" . $row['Username'] . "</h1>";
            echo "<p><strong>Ditt Namn: </strong>" . $row['FirstName'] . " " . $row['LastName'] . "</p>";
            echo "<p><strong>Ditt Main Spel: </strong>" . $row['MainGame'] . "</p>";
            echo "<p><strong>Din Plats: </strong>" . $row['TableNum'] . "</p>";
          echo "</div>";
        }
      } else {
        $_SESSION['profile-fail'] = "<h3 class='header_popup'>Ingen profil hittades</h3>";
        header("Location: myprofile");
        die();
      }

    }
  }


  class Tournament {

    function tournament_signup($GameID, $USERid) {

      $Game = "";
      if ($GameID == "1") {$Game = "League of Legends";}
      if ($GameID == "2") {$Game = "CSGO";}
      if ($GameID == "3") {$Game = "Hearthstone";}

      // Include MYSQL for SQL command.
      include "mysql.php";

      $sql = "INSERT INTO tournaments (Game, USERid)
              VALUES ('$GameID', '$USERid')";

      if ($conn->query($sql) === TRUE) {
          $_SESSION['tournament-success'] = "<h2 class='header_popup'>Du har gått med i " . $Game . " turneringen.</h2><br>";
          header("Location: tournament");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    function tournament_cancel($GameID, $USERid) {

      $Game = "";
      if ($GameID == "1") {$Game = "League of Legends";}
      if ($GameID == "2") {$Game = "CSGO";}
      if ($GameID == "3") {$Game = "Hearthstone";}

      // Include MYSQL for SQL command.
      include "mysql.php";

      $sql = "DELETE FROM tournaments WHERE Game='$GameID' AND USERid='$USERid'";

      if ($conn->query($sql) === TRUE) {
          $_SESSION['tournament-success'] = "<h2 class='header_popup'>Du har gått ur " . $Game . " turneringen.</h2><br>";
          header("Location: tournament");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    function already_signup($USERid, $id) {

      include "mysql.php";

      $sql = "SELECT Game, USERid FROM tournaments WHERE Game='$id' AND USERid='$USERid'";

      if ($result = mysqli_query($conn,$sql)) {
        $rowcount = mysqli_num_rows($result);

        if ($rowcount != "1") {

          return "<a class='button' href='tournament-signup?gameid=" . $id . "'>Delta</a>";

        } else {
          return "<a class='button' href='tournament-cancel?gameid=" . $id . "'>Gå ur Turnering</a>";
        }
      }
    }
  }


  /**
   *  News System
   */
  class News
  {

    function post_news($title, $text, $name) {

      include "mysql.php";

      $sql = "INSERT INTO news (Title, Text, Name)
              VALUES ('$title', '$text', '$name')";

      if ($conn->query($sql) === TRUE) {
          $_SESSION['news-success'] = "<h3 class='header_popup'>You posted some news</h3>";
          header("Location: index.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    public function show_news() {

      // Include MYSQL for SQL command.
      include "mysql.php";

      // Connect to the Database to get the Profile informaton
      $sql = "SELECT Title, Text, Name FROM news ORDER BY NewsID DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

          echo "<div class='news-content'>";
            echo "<h1>". $row['Title'] . "</h1>";
            echo "<hr>";
            echo "<p>" . $row['Text'] . "</p>";
            echo "<hr>";
            echo "<p><strong>Skrivet av: </strong>" . $row['Name'] . "</p>";
          echo "</div>";
        }
      }
    }
  }



  /**
   * Placing and order system
   */
  class Placing
  {

    function alreadyBoked($USERid) {

      include "mysql.php";

      $sql = "SELECT TableNum FROM users WHERE USERid = '$USERid'";
    	$result = $conn->query($sql);

    	if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          if ($row['TableNum'] != "0") {
            echo "
              <i class='fa fa-times' aria-hidden='true'></i><a class='button' href='cancel-boking'>Avboka</a>
              <i class='fa fa-arrows' aria-hidden='true'></i><a class='button' href='move-seat'>Flytta</a>
            ";
          } else {
            echo "<i class='fa fa-check-circle-o' aria-hidden='true'></i><a class='button' href='order'>Boka</a>";
          }
        }
      }
    }

    function placing($seat) {

      include "mysql.php";

    	$sql = "SELECT TableNum FROM users WHERE TableNum = '$seat'";
    	$result = $conn->query($sql);

    	if ($result->num_rows > 0) {

    		return "<p class='taken'>$seat</p>";

    	} else {
    		return "<p>$seat</p>";
    	}
    }

    function placing_order($seat) {

      include "mysql.php";

    	$sql = "SELECT TableNum FROM users WHERE TableNum = '$seat'";
    	$result = $conn->query($sql);

    	if ($result->num_rows > 0) {

    		return "<p class='taken_order'>$seat</p>";

    	} else {
    		return "<input type='radio' name='seat' value='$seat'/><p>$seat</p>";
    	}
    }

    function order($USERid, $OrderSeat) {

      include "mysql.php";

      $sql = "UPDATE users SET TableNum = '$OrderSeat' WHERE USERid = '$USERid'";

      if ($conn->query($sql) === TRUE) {
          $_SESSION['order-success'] = "<h3 class='header_popup'>Du har bokat plats " . $OrderSeat . "</h3>";
          header("Location: placing");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    function move($USERid, $OrderSeat) {
      include "mysql.php";

      $sql = "UPDATE users SET TableNum = '$OrderSeat' WHERE USERid = '$USERid'";

      if ($conn->query($sql) === TRUE) {
          $_SESSION['order-success'] = "<h3 class='header_popup'>Du har bokat plats " . $OrderSeat . "</h3>";
          header("Location: placing");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    function cancel($USERid) {
      include "mysql.php";

      $sql = "UPDATE users SET TableNum='' WHERE USERid = '$USERid'";

      if ($conn->query($sql) === TRUE) {
        $_SESSION['order-success'] = "<h3 class='header_popup'>Du har avbokat din plats</h3>";
        header("Location: placing");
      } else {
        echo "Error deleting record: " . $conn->error;
      }
    }
  }
