<?php 
    session_start();

    require_once "authHelper.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body style="background-color: #b3f8ff">
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
    <div class="container">
        <div id="content">
            <h1>Query Results</h1>
            <?php
              extract($_POST);

              $hostname = "mysql";
              $username = "root";
              $password = "cmpe272password";
              $dbname = "cmpe_272";
              $conn = mysqli_connect($hostname,$username,$password,$dbname);

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } else {
                if ($submit == "search") {
                  queryUser($firstname, $lastname, $email, $address, $homephone, $cellphone);
                } else if ($submit == "create") {
                  createUser($firstname, $lastname, $email, $address, $homephone, $cellphone);
                } else {
                  echo "You have submitted nothing";
                }
              }

              function queryUser($firstname, $lastname, $email, $address, $homephone, $cellphone) {
                global $conn;
                $userQuery = "
                  SELECT * FROM Users
                  WHERE firstname like '%" . $firstname . "%'
                  AND lastname like '%" . $lastname . "%'
                  AND email like '%" . $email . "%'
                  AND address like '%" . $address . "%'
                  AND homephone like '%" . $homephone . "%'
                  AND cellphone like '%" . $cellphone . "%'
                ";

                if(!($result = mysqli_query($conn, $userQuery))) {
                  echo "Could not execute query!<br>";
                  die(mysqli_error($conn));
                } else {
                  echo "
                    <table border=\"1\" style=\"padding: 10px;\">
                      <thead>
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

                  for ($counter = 0; $row = mysqli_fetch_row($result); $counter++) {
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                      echo "<td>$value</td>";
                    }
                    echo "</tr>";
                  }
                }
              }

              function createUser($firstname, $lastname, $email, $address, $homephone, $cellphone) {
                global $conn;
                $userCreateQuery = "INSERT INTO Users(firstname,lastname,email,address,homephone,cellphone) VALUES
                            ('$firstname','$lastname','$email','$address','$homephone','$cellphone')";
                if ($conn->query($userCreateQuery) === TRUE) {
                  echo "<h4>New user have been added to database.</h4><br/>";
                } else {
                  echo "<h4>Failed to add user to database.</h4><br/>";
                  echo "Error: " . $userCreateQuery . "<br/>" . $conn->error;
                }
              }
              mysqli_close($conn);
            ?>
            </table>
        </div>
    </div>
  </body>
</html>