<?php
require_once('functions.php');

// action handler
if(isset($_POST['action']) ){
    $call = $_POST['action'];
    if (function_exists($call)){
      call_user_func($call);
    }
    // if ($_POST['action'] == "login") { login(); }
    // if ($_POST['action'] == "register") { register(); }

}



// registration handlers
function login(){
  $response = array();
  if(isset($_POST['username']) && isset($_POST['password']) ){
    $response = check_login($_POST);
  }else{
    $response = array(
      "correct"=>false,
      "msg"=>"The Username and Password aren't set"
    );
  }
  echo json_encode($response);
}

function register(){
  $response = array();
  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone']) && isset($_POST['dob']) ){
    $response = reigster_user($_POST);
  }else{
    $response = array(
      "correct"=>false,
      "msg"=>"Some of the parameters aren't set"
    );
  }
  echo json_encode($response);
}

function logout(){
  $response = array(
    "correct"=>session_destroy()
  );
  echo json_encode($response);

}
