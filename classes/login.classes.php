<?php

class Login extends Dbhandler{
  protected function getUser($uid, $pwd) {
    $statement = $this->connect()->prepare('SELECT user_pwd FROM users WHERE user_uid = ? OR user_email = ?;');

    if(!$statement->execute(array($uid, $pwd))) {
      $statement = null;
      header("location: ../index.php?error=statementfailed");
      exit();
    }

    if($statement->rowCount() == 0) {
      $statement = null;
      header("location: ../index.php?error=usernotfound");
      exit();
    }

    $pwdHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
    $checkPwd = password_verify($pwd, $pwdHashed[0]["user_pwd"]);

    if($checkPwd == false) {
      $statement = null;
      header("location: ../index.php?error=wrongpassword");
      exit();
    } elseif($checkPwd == true) {
      $statement = $this->connect()->prepare('SELECT * FROM users WHERE user_uid = ? OR user_email = ? AND user_pwd = ?;');

      if(!$statement->execute(array($uid, $uid,  $pwd))) {
        $statement = null;
        header("location: ../index.php?error=statementfailed");
        exit();
      }
      if($statement->rowCount() == 0) {
        $statement = null;
        header("location: ../index.php?error=usernotfound");
        exit();
      }
      $user = $statement->fetchAll(PDO::FETCH_ASSOC);

      session_start();
      $_SESSION["userid"] = $user[0]["user_id"];
      $_SESSION["useruid"] = $user[0]["user_uid"];

      $statement = null;
    }
  }
}
