<?php
  session_start();

  require_once "authHelper.php";
  include_once './api/Database.php';
  include_once './api/UserReviewedProduct.php';

  
  $database = new Database();
  $db = $database->getConnection();
    
  // initialize object
  $product = new UserReviewedProduct($db);

  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  http_response_code(200);
  
  // show products data in json format
  $array = array();
  extract($_POST);
  $array['rating'] = $rating;
  $product->rate(1, $product_id, $rating);
  echo json_encode($array);
?>