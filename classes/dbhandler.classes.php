<?php

class Dbhandler {
  protected function connect() {
    try {
      $username = "root";
      $password = "";
      $dbhandler = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
      return $dbhandler;
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}

