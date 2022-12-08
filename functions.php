<?php
require_once('database.php');
// function
function is_user_logged_in() {
  return isset($_SESSION['logged_in'])?$_SESSION['logged_in']:false;
}
function get_current_username(){
  return isset($_SESSION['username'])$_SESSION['username']:null;
}
function get_current_user_id(){
  return isset($_SESSION['user_id'])?$_SESSION['user_id']:null;
}

function get_current_user() {
  if(!is_user_logged_in())return null;
  if(!get_user_username())return null;
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // prepare sql and bind parameters
  $username = get_user_username();
  $stmt = $conn->prepare("SELECT (id, username, password,firstname, lastname) from users where username=:username");
  $stmt->bindParam(':username', $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!empty($result)) {
    return $result;
  }else{
    return null;
  }

}

function logon_user($username){
  if(!isset($_SESSION)) session_start();
  $user = get_current_user();
  $_SESSION['logged_in'] = true;
  $_SESSION['username'] = $username;
  $_SESSION['user_id'] = $user['id'];
}
