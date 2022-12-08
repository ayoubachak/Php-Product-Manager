<?php
require_once('../database.php');

class User{
  private $id;
  private $username;
  private $password;
  private $firstname;
  private $lastname;

  function __construct(){

  }

  function password_encoder($password){
    return md5($password);
  }

  function save(){
    $sql = "INSERT INTO users (username, password, firstname, lastname) VALUES (?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([this.username,this.password_encoder(this.password),this.firstname,this.lastname]);
    return this;
  }

  function setid($id){
    this.username = $id
  }
  function getid(){
    return this.id;
  }

  function setusername($username){
    this.username = $username;
  }
  function getusername(){
    return this.username;
  }

  function setpassword($password){
    this.password = $password;
  }
  function getpassword(){
    return this.password;
  }

  function setfirstname($firstname){
    this.firstname = $firstname;
  }
  function getfirstname(){
    return this.firstname;
  }

  function setlastname($lastname){
    this.lastname = $lastname;
  }
  function getlastname(){
    return this.lastname;
  }

  function show(){
    $str = "User{
      username:$username,
      firstname:$firstname,
      lastname:$lastname
    }";
    return $str;
  }
}
