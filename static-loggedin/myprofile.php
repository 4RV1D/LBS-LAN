<div class="profile">
  <div class="content">
    <?php
        $PrivateProfile = new PrivateProfile();
        $PrivateProfile->db_get_information($_SESSION['logged-in']);
    ?>
  </div>
</div>
