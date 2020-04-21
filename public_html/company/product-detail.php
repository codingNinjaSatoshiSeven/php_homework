<?php 
  session_start();

  require_once "authHelper.php";
?>
<?php 
  $productname = strval(htmlspecialchars($_GET["card"]));
  $historical_data;
  if(isset($_COOKIE['latest_visit'])) {
    $historical_data = json_decode($_COOKIE['latest_visit']);
  }
  if(!isset($historical_data)) {
    $historical_data = array();
  }
  
  array_push($historical_data, $productname);
  if (count($historical_data)> 5) {
    array_shift($historical_data);
  }
  setcookie('latest_visit', json_encode($historical_data), time()+3600);
  
  $most_visit;
  if(isset($_COOKIE['most_visit'])) {
    $most_visit = json_decode($_COOKIE['most_visit'], true);
  }
  if(!isset($most_visit)) {
    $most_visit = array();
  }
  $count = isset($most_visit[$productname]) ? $most_visit[$productname]:  0;
  $most_visit[$productname] = $count+1;
  setcookie('most_visit', json_encode($most_visit));
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
        <li><a href="/company/all-companies-users.php">All Companies Users</a></li>
        <?php if($isLoggedIn): ?>
            <li><a href="/company/logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <div class="container" style="color: white">
    <div style="color: white">
      <?php
        $hostname = "mysql"; // change when deploying
        $username = "root";
        $password = "password"; // change when deploying
        $dbname = "cmpe_272";
        $conn = mysqli_connect($hostname,$username,$password,$dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } else {
          queryProduct($productname);
        }

        function queryProduct($productname) {
          global $conn;
          $productQuery = "
            SELECT * FROM Products
            WHERE name= '" . $productname . "'
            LIMIT 1;
          ";

          if(!($result = mysqli_query($conn, $productQuery))) {
            echo "Could not execute query!<br>";
            die(mysqli_error($conn));
          } else {
            for ($counter = 0; $row = mysqli_fetch_assoc($result); $counter++) {
              echo "<div class='margin-top: 110px;'>". $row['description'] ."</div>";
              echo '<ul style="margin-top: 110px">';
              echo "
                <li>
                  <div class='card-detail'>
                    <h2>". $row['display_name'] ."</h2>
                    <img src='". $row['image'] ."' style='padding-top: 30px'>
                    <h4>$". $row['price'] ."</h4>
                  </div>
                </li>
              ";
              echo '</ul>';
              
            }
          }
        }
      ?>
    </div>
  </div>
  </body>
</html>