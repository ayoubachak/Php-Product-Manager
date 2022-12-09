<?php
require_once('functions.php');

// action handler
if(isset($_POST['action']) ){
    $call = $_POST['action'];
    if (function_exists($call)){
      call_user_func($call);
    }
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

function add_product(){
  $response = array();
  // verification of all the params before the execution
  $key = 'product-add-';
  $params = array('label', 'price', 'pdate', 'category');
  $all_set = true;
  foreach($params as $param){
    if(!isset($_POST[$key.$param])) $all_set = false;
  }
  $all_set = $all_set && isset($_FILES[$key.'picture']);

  if($all_set){

    $label = $_POST[$key.'label'];
    $price = $_POST[$key.'price'];
    $pdate = $_POST[$key.'pdate'];
    $category = $_POST[$key.'category'];
    $picture = $_FILES[$key.'picture'];
    $temp_pic_name = $picture['tmp_name'];
    $image_dir = md5(get_current_username()).'/';
    $img_extension = end(explode('.', $picture['name']));
    $img_name_length = 16;
    $image_name =randomString($img_name_length).'.'.$img_extension;
    $full_img_path = __DIR__.'/uploads/products/images/'. $image_dir;
    if (!file_exists($full_img_path)) {
      mkdir($full_img_path, 0777, true);
    }
    move_uploaded_file($picture['tmp_name'], $full_img_path.$image_name);
    $response = array(
      'full_img_path'=>$full_img_path
    );
    $path_to_save = '/uploads/products/images/'. $image_dir.$image_name;
    $user = get_user_by_username($username);
    $id_owner = get_user_by_username(get_current_username())['id'];
    $response = insert_product($label, $price, $pdate,$path_to_save , $category, $id_owner);
  }else{
    $response = array(
      "correct"=>false,
      "msg"=>"some params aren't set"
    );
  }
  echo json_encode($response);
}
