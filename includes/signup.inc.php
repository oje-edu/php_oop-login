<?php

if(isset($_POST["submit"])) {
  // Grabbing the form data
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];
  $email = $_POST["email"];

  // Instantiating the SignupController class (the include order matters)
  include "../classes/dbhandler.classes.php";
  include "../classes/signup.classes.php";
  include "../classes/signup-controller.classes.php";
  $signup = new SignupController($uid, $pwd, $pwdrepeat, $email);

  // Running error handlers and User signup
  $signup->signupUser();
  // Redirecting to index.php
  header("Location: ../index.php?error=none");
}