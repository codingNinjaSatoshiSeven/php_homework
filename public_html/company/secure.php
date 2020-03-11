<?php
    session_start();

    require_once "authHelper.php";

    if ($isLoggedIn) {
        header("Location:" . "users.php");
        exit;
    }

    if (! empty($_POST["login"])) {
        $isAuthenticated = false;
        
        $username = $_POST["login_id"];
        $password = $_POST["password"];
        
        
        if ($username == "admin" && $password == "password") {
            $isAuthenticated = true;
        }
        
        if ($isAuthenticated) {
            $_SESSION["member_id"] = "admin";
            
            header("Location:" . "users.php");
            exit;
        } else {
            $message = "Invalid Login";
        }
    }
?>
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
          <?php if($isLoggedIn): ?>
              <li><a href="/company/logout.php">Logout</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-4 col-offset-4">
                <form action="" method="post">
                    <div style="color: red; background-color: white;"><?php if(isset($message)) { echo $message; } ?></div>
                    <div class="form-group">
                        <div>
                            <label for="login" style="color: white;">Username</label>
                        </div>
                        <div>
                            <input name="login_id" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="member_password" style="color: white;">Password</label>
                        </div>
                        <div>
                            <input name="password" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="submit" name="login" value="Login"
                            class="btn btn-primary"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>