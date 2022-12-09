<?php
require_once('database.php');
// utility functions
function is_user_logged_in() {
  return isset($_SESSION['logged_in'])?$_SESSION['logged_in']:false;
}
function get_current_username(){
  return isset($_SESSION['username'])?$_SESSION['username']:null;
}
function get_current_user_id(){
  return isset($_SESSION['user_id'])?$_SESSION['user_id']:null;
}
function get_current_full_name(){
  $username = get_current_username();
  if($username){
    $user = get_user_by_username($username);
    return  $user['firstname']." ".$user['lastname'];
  }
  return null;
}

function get_the_user() {
  global $conn;
  if(!is_user_logged_in())return null;
  $username = get_current_username();
  return get_user_by_username($username);

}

function get_user_by_username($username){
  global $conn;
  $stmt = $conn->prepare("SELECT * from users where username=:username");
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!empty($result)) {
    return $result;
  }else{
    return null;
  }
}

// registration functions
function check_login($data){
  $username = $data['username'];
  $password = $data['password'];
  $user = get_user_by_username($username);
  if(!$user){
    return array(
      "correct"=> false,
      "msg"=>"User doesn't exist"
    );
  }

  $user_password = $user['password'];
  if( md5($password) == $user_password){
    logon_user($username);
    return array(
      "correct"=> true,
      "msg"=>"Connection succeded"
    );
  }else{
    return array(
      "correct"=> false,
      "msg"=>"Password Incorrect"
    );
  }
}

function logon_user($username){
  if(!isset($_SESSION)) session_start();
  $_SESSION['logged_in'] = true;
  $_SESSION['username'] = $username;
}

function reigster_user($data){
  global $conn;
  $username = $data['username'];
  $password = md5($data['password']);
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $phone = $data['phone'];
  $dob = $data['dob'];
  $response = array();
  if(get_user_by_username($username)){
    $response = array(
      "correct"=>false,
      "msg"=>"User with this email already exists"
    );
  }else{
    $stmt = $conn->prepare("INSERT INTO users (username, password, firstname, lastname, phone, dob) values (:username, :password, :firstname, :lastname, :phone, :dob )");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':dob', $dob);
    $status = $stmt->execute();
    if($status){
      // if the user is inserted we log the user in
      logon_user($username);
      $response = array(
        "correct"=>true,
        "msg"=>"User registered successfully"
      );
    }else{
      $response = array(
        "correct"=>false,
        "msg"=>"Something went wrong"
      );
    }
  }
  return $response;
}

// server functions
function upload_path(){
  return __DIR__.'\\uploads\\products\\images\\';
}


function get_dummy_image(){
  return './uploads/products/images/test.jpg';
}

function get_actions_for($id){
  return '
  <ul class="list-inline m-0">
    <li class="list-inline-item">
        <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" onclick="delete_product('.$id.')"><i class="fa fa-edit"></i></button>
    </li>
    <li class="list-inline-item">
        <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="delete_product('.$id.')"><i class="fa fa-trash"></i></button>
    </li>
  </ul>';
}
