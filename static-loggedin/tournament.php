<div class="tournament">
  <div class="content">

    <?php
      @session_start();

      $Tournament = new Tournament();

      if(isset($_SESSION['tournament-success'])){
        echo $_SESSION['tournament-success'];
        unset($_SESSION['tournament-success']);
      }
    ?>

    <div class="tournament_div">
      <div class="tour_img">
        <img src="assets/img/lol-tournament.jpg" alt="" />
      </div>
      <div class="tour_info">
        <h1>League of Legends</h1>
        <p><strong>1 v 1</strong> Best of 1
        <br>Hollowing Abyss
        <br>Final best of 3</p>
        <?php echo $Tournament->already_signup($_SESSION['logged-in'], "1"); ?>
      </div>
    </div>
    <div class="tournament_div">
      <div class="tour_img">
        <img src="assets/img/csgo-tournament.jpg" alt="" />
      </div>
      <div class="tour_info">
        <h1>Counter Strike Global Offensive</h1>
        <p>
        <strong>1 v 1</strong> Best of 1
        <br>Aim map
        <br>Final best of 3</p>
        <?php echo $Tournament->already_signup($_SESSION['logged-in'], "2"); ?>
      </div>
    </div>
    <div class="tournament_div">
      <div class="tour_img">
        <img src="assets/img/hearthstone-tournament.jpg" alt="" />
      </div>
      <div class="tour_info">
        <h1>Hearthstone</h1>
        <p><strong>1 v 1</strong> Best of 3
        <br>Final best of 5</p>
        <?php echo $Tournament->already_signup($_SESSION['logged-in'], "3"); ?>
      </div>
    </div>
  </div>
</div>
