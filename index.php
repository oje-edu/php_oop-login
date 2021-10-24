<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic PHP Login Boilerplate</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<header>
  <nav>
    <div>
      <h3>NOCONCEPT DEV</h3>
      <ul class="main-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Produkte</a></li>
        <li><a href="#">Verkäufe</a></li>
        <li><a href="#">Mitglieder</a></li>
      </ul>
    </div>
    <ul class="member-menu">
      <?php
        if(isset($_SESSION["userid"]))
        {
      ?>
        <li><a href="#">Hallo<span>&nbsp;<?php echo $_SESSION["useruid"]; ?></span></a></li>
        <li><a href="includes/logout.inc.php" class="header-login-1">Abmelden</a></li>
      <?php
        } else {
      ?>
        <li><a href="#">Registrieren</a></li>
        <li><a href="#" class="header-login-1">Einloggen</a></li>
       <?php
        }
      ?>
    </ul>
  </nav>
</header>

<section class="index-intro">
  <div class="index-intro-bg">
    <div class="wrapper">
      <div class="index-intro-c1">
        <div class="video"></div>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio ex repellendus tenetur officia dignissimos aspernatur illum beatae sit, nam nostrum!</p>
      </div>
      <div class="index-intro-c2">
        <h2>PHP OOP Login Boilerplate</h2>
        <a href="#">QUELLCODE</a>
      </div>
    </div>
  </div>
</section>

<section class="index-login">
  <div class="wrapper">
    <div class="index-login-signup">
      <h4>Registrieren</h4>
      <p>Du noch kein Konto? Hier registrieren</p>
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Benutzername">
        <input type="password" name="pwd" placeholder="Passwort">
        <input type="password" name="pwdrepeat" placeholder="Passwort wiederholen">
        <input type="email" name="email" placeholder="E-Mail">
        <br>
        <button type="submit" name="submit">Registrieren</button>
      </form>
    </div>
    <div class="index-login-login">
      <h4>Einloggen</h4>
      <p>Du bereits ein Konto? Hier einloggen</p>
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Benutzername">
        <input type="password" name="pwd" placeholder="Passwort">
        <br>
        <button type="submit" name="submit">Einloggen</button>
      </form>
    </div>
  </div>
</section>

</body>
</html>