<?php

if(isset($_POST["submit"])) {
  // Grabbing the form data
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];

  // Instantiating the LoginController class (the include order matters)
  include "../classes/dbhandler.classes.php";
  include "../classes/login.classes.php";
  include "../classes/login-controller.classes.php";
  $login = new LoginController($uid, $pwd);

  // Running error handlers and User signup
  $login->loginUser();
  // Redirecting to index.php
  header("Location: ../index.php?error=none");
}