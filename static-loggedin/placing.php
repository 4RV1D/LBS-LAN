<div class="placing">
  <div class="content">
    <?php
      @session_start();
      $placing = new Placing("0");

      if(isset($_SESSION['order-success'])){
        echo $_SESSION['order-success'];
        unset($_SESSION['order-success']);
      }
    ?>

    <div class="buttons">
      <?php
        $placing->alreadyBoked($_SESSION['logged-in']);
      ?>
    </div>

    <h1>Rum 1 <span class="font_light"><i>(mellan sal 2 & 3)</i></span></h1>
    <div class="row">
      <ul class="margin-bottom">
        <?php
          $a = 1;
          while ($a <= 4) {
            echo "<li>" . $placing->placing("A" . $a++ . "") . "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="row">
      <ul>
        <?php
          $a = 5;
          while ($a <= 8) {
            echo "<li>" . $placing->placing("A" . $a++ . "") . "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="row">
      <ul>
        <?php
          $a = 9;
          while ($a <= 12) {
            echo "<li>" . $placing->placing("A" . $a++ . "") . "</li>";
          }
        ?>
      </ul>
    </div>
    <div class="row">
      <ul class="margin-top">
        <?php
          $a = 13;
          while ($a <= 16) {
            echo "<li>" . $placing->placing("A" . $a++ . "") . "</li>";
          }
        ?>
      </ul>
    </div>

<!---------------------------------------------------------->

      <h1>Rum 2 <span class="font_light"><i>(sal 2)</i></span></h1>
      <div class="row">
        <ul>
          <?php
            $b = 1;
            while ($b <= 6) {
              echo "<li>" . $placing->placing("B" . $b++ . "") . "</li>";
            }
          ?>
        </ul>
      </div>
      <div class="row">
        <ul>
          <?php
            $b = 7;
            while ($b <= 12) {
              echo "<li>" . $placing->placing("B" . $b++ . "") . "</li>";
            }
          ?>
        </ul>
      </div>
      <div class="row">
        <ul class="margin-top">
          <?php
            $b = 13;
            while ($b <= 18) {
              echo "<li>" . $placing->placing("B" . $b++ . "") . "</li>";
            }
          ?>
        </ul>
      </div>
      <div class="row">
        <ul>
          <?php
            $b = 19;
            while ($b <= 24) {
              echo "<li>" . $placing->placing("B" . $b++ . "") . "</li>";
            }
          ?>
        </ul>
      </div>

  </div>
</div>
