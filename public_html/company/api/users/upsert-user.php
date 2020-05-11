<?php
// include database and object files
  include_once '../Database.php';
  include_once '../CompanyUser.php';

  // required headers
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
    
  // instantiate database and product object
  $database = new Database();
  $db = $database->getConnection();
    
  // initialize object
  $user = new CompanyUser($db);

  extract($_POST);
  
  if (is_null($username) || is_null($password)) {
    http_response_code(400);
    echo json_encode(array('error'=> 'username or password is missing'));
  } else {
    $user->create($username, $password);
    $result = $user->get($username);
    $row = $result->fetch_assoc();
    $user_item=array(
      "id" => $row['id'],
      "username" => $row['username']
    );
    http_response_code(201);
    echo json_encode($user_item);
  }
  
?>