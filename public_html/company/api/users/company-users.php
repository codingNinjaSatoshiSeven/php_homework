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

  // query products
  $result = $user->read();
    
  // check if more than 0 record found
  // users array
  $users_arr=array();

  while($row = $result->fetch_assoc()) {
    $user_item=array(
      "id" => $row['id'],
      "username" => $row['username']
    );
    array_push($users_arr, $user_item);
  }
  // set response code - 200 OK
  http_response_code(200);
  
  // show products data in json format
  echo json_encode($users_arr);
?>