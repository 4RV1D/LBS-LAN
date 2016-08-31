<div class="profile">
  <div class="content">
    <?php
      $USERid = htmlspecialchars($_GET["id"]);

      $Profile = new Profile();
      $Profile->db_get_information($USERid);
    ?>
  </div>
</div>
