<?php
  include_once '../../api/Database.php';
  include_once '../../api/UserReviewedProduct.php';

  
  $database = new Database();
  $db = $database->getConnection();
    
  // initialize object
  $product = new UserReviewedProduct($db);

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  
  // show products data in json format
  $array = array();
  extract($_POST);
  $array['rating'] = $rating;
  $array['product_id'] = $product_id;
  $array['user_id'] = $user_id;
  if (!$user_id) {
    http_response_code(401);
    echo json_encode(array('error'=> 'user not authenticated'));
  }
  if(!$product_id) {
    http_response_code(400);
    echo json_encode(array('error'=> 'product_id is required'));
  }
  $product->rate($user_id, $product_id, $rating);
  http_response_code(200);
  echo json_encode($array);
?>