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
    <div class="container">
      <div id="content">
        <h1 style="color: white;">Search User or Add User</h1>
        <form method = "post" action = "/company/db-result.php" role="form">
          <div class="form-group">
            <div>
              <label for="firstname">First Name:</label>
            </div>
            <div>
              <input name="firstname" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for="lastname">Last name:</label>
            </div>
            <div>
              <input name="lastname" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for="email">Email:</label>
            </div>
            <div>
              <input name="email" type="email" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for="address">Address:</label>
            </div>
            <div>
              <input name="address" type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for="homephone">Home Phone:</label>
            </div>
            <div>
              <input name="homephone" type="number" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for="cellphone">Cell Phone:</label>
            </div>
            <div>
              <input name="cellphone" type="number" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit" name="submit" value="search">Search</button>
          </div>
          <div class="form-group">
              <button class="btn btn-primary" type="submit" name="submit" value="create">Create</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>