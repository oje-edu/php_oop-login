<?php

session_start();
session_unset();
session_destroy();

  // Redirecting to index.php
  header("Location: ../index.php?error=loggedout");
