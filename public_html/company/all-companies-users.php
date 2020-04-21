<?php
// include database and object files
  include_once './api/Database.php';
  include_once './api/User.php';
  session_start();
  require_once "authHelper.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/company/">Yu-Gi-Oh Cards</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="/company/">Home</a></li>
          <li><a href="/company/about.php">About</a></li>
          <li><a href="/company/products.php">Products</a></li>
          <li><a href="/company/news.php">News</a></li>
          <li><a href="/company/contacts.php">Contacts</a></li>
          <li><a href="/company/secure.php">Secure</a></li>
          <li><a href="/company/user-query.php">User Query</a></li>
          <?php if($isLoggedIn): ?>
              <li><a href="/company/logout.php">Logout</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <div class="container" style="color: white; text-align: center;">
      <div id="output1">
        <?php
          $database = new Database();
          $db = $database->getConnection();
            
          // initialize object
          $user = new User($db);
        
          // query products
          $result = $user->read();
            
          // check if more than 0 record found
          // users array
          $users_arr=array();
          $html = ob_get_contents();
          ob_end_clean();
          $loop_result = "";
          while($row = $result->fetch_assoc()) {
            $user_item=array(
              "id" => $row['id'],
              "firstname" => $row['firstname'],
              "lastname" => $row['lastname'],
              "email" => $row['email'],
              "address" => $row['address'],
              "homephone" => $row['homephone'],
              "cellphone" => $row['cellphone']
            );
            array_push($users_arr, $user_item);
          }

          echo "
            
            <table border=\"1\" style=\"padding: 10px;\">
              <thead>
              <h1> Company Yu-gi-oh card users</h1>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Homephone</th>
                <th>Cellphone</th>
              </tr>
            </thead>
          ";

          for ($counter = 0; $counter < count($users_arr); $counter++) {
            $row = $users_arr[$counter];
            echo "<tr>";
            echo "<td>". $row['id'] ."</td>";
            echo "<td>". $row['firstname'] ."</td>";
            echo "<td>". $row['lastname'] ."</td>";
            echo "<td>". $row['email'] ."</td>";
            echo "<td>". $row['address'] ."</td>";
            echo "<td>". $row['homephone'] ."</td>";
            echo "<td>". $row['cellphone'] ."</td>";
            echo "</tr>";
          }
        ?>
        <?php
          $url = 'http://pichao314.com/curl.php';

          $cURL = curl_init();
          
          curl_setopt($cURL, CURLOPT_URL, $url);
          curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($cURL, CURLOPT_HTTPGET, true);
          
          curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
          ));
          
          $result = curl_exec($cURL);
          $json = json_decode($result, true);
          curl_close($cURL);
          
          echo "
            
            <table border=\"1\" style=\"padding: 10px;\">
              <thead>
              <h1>Company PC 314 users</h1>
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Homephone</th>
                <th>Cellphone</th>
                <th>Registration Date</th>
              </tr>
            </thead>
          ";

          for ($counter = 0; $counter < count($json); $counter++) {
            echo "<tr>";
            foreach ($json[$counter] as $key => $value) {
              echo "<td>$value</td>";
            }
            echo "</tr>";
          }
        ?>
      </div>
    </div>
  </body>
</html>