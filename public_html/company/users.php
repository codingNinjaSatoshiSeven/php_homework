<?php 
  session_start();

  require_once "authHelper.php";

  if(!$isLoggedIn) {
    header("Location:" . "secure.php");
  }
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
  <div class="container">
        <h1 style="color: white;">
        <?php
            echo("This is the Users page.");
        ?>
        </h1>
        <br />
        <table style="color: white; border: 1px solid white;">
            <tr style="border: 1px solid white;">
                <th valign="top">User </th>
            </tr>
            <?php
                $file = fopen("./users.txt", "r") or die("Unable to open file!");
                while (!feof($file)){   
                    $data = fgets($file); 
                    echo "<tr style='border: 1px solid white;'><td>" . str_replace('|','</td><td>',$data) . '</td></tr>';
                }
                fclose($file);
            ?>
        </table>
  </div>
  </body>
</html>