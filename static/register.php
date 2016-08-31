<div class="register">
  <form class="form" enctype="multipart/form-data" action="register" method="POST">
    <h1 class="font_light">Registrera Dig</h1>
    <h2 class="font_light">Kontakt Information</h2>
    <div class="name-field">
      <i class="fa fa-user"></i>
      <input type="text" name="first-name" placeholder="Förnamn">
      <i class="fa fa-user"></i>
      <input type="text" name="last-name" placeholder="Efternamn">
    </div>

    <div class="contact-field">
      <i class="fa fa-envelope-o"></i>
      <input type="email" name="email" placeholder="Email Adress">
      <i class="fa fa-phone"></i>
      <input type="tel" name="phone" placeholder="Telefon Nummer">
    </div>

    <h2 class="font_light">Användar Information</h2>
    <div class="user-field">
      <i class="fa fa-user"></i>
      <input type="text" name="username" placeholder="Användarnamn">
      <i class="fa fa-gamepad" aria-hidden="true"></i>
      <input type="text" name="main-game" placeholder="Favorit Spel">
    </div>
    <div class="password-field">
      <i class="fa fa-key"></i>
      <input type="password" name="password" placeholder="Lösenord">
      <i class="fa fa-key"></i>
      <input type="password" name="password-confirm" placeholder="Lösenords Bekräftelse">
    </div>

    <div class="profil-upload">
      <input type="file" name="image" id="image" accept="image/*">
      <i class="fa fa-upload" aria-hidden="true"></i><label for="image">Välj Profilbild</label>
    </div>

    <input class="button" type="submit" name="register" value="Registrera"></button>
  </form>
</div>
