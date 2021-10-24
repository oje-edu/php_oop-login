DROP DATABASE IF EXISTS ooplogin;
CREATE DATABASE ooplogin;
USE ooplogin;
CREATE TABLE users (
  user_id INT(11)  AUTO_INCREMENT NOT NULL,
  user_uid VARCHAR(100) NOT NULL,
  user_pwd VARCHAR(255) NOT NULL,
  user_email VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP,

  PRIMARY KEY (user_id)
);