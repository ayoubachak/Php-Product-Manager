<?php
require_once('database.php');

// action handler
if(isset($_POST['action'])){
    if ($_POST['action'] == "login") { login(); }
}



function login(){
  $response = array();
  

  echo json_encode($_POST);
}
