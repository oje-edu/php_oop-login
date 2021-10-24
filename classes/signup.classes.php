<?php

class Signup extends Dbhandler{
  protected function setUser($uid, $pwd, $email) {
    $statement = $this->connect()->prepare('INSERT INTO users (user_uid, user_pwd, user_email) VALUES (?, ?, ?);');

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(!$statement->execute(array($uid, $hashedPwd, $email))) {
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }
    $statement = null;
  }

  protected function checkUser($uid, $email) {
    $statement = $this->connect()->prepare('SELECT user_uid FROM users WHERE user_uid= ? OR user_email= ?;');

    if(!$statement->execute(array($uid, $email))) {
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }

    $resultCheck;
    if($statement->rowCount() > 0) {
      $resultCheck = false;
    } else {
      $resultCheck = true;
    }
    return $resultCheck;
  }
}
