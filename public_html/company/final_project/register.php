<?php
  session_start();
  require_once "authHelper.php";
  include_once '../api/Database.php';
  include_once '../api/CompanyUser.php';
  $database = new Database();
  $db = $database->getConnection();
    
  // initialize object
  $user = new CompanyUser($db);

  if ($isLoggedIn) {
    header("Location:" . "index.php");
    exit;
  }

  if (!empty($_POST["register"])) {
    $isAuthenticated = false;
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = $user->get($username);
    $row = $result->fetch_assoc();
    $row2;

    if(!is_null($row)) {
      if($password != $row['password']) {
        $message = "Account Already exists. and you entered wrong password";
      } else {
        $isAuthenticated = true;
        $isLoggedIn = true;
      }
    } else {
      $user->create($username, $password);
      $result = $user->get($username);
      $row2 = $result->fetch_assoc();
      $isAuthenticated = true;
      $isLoggedIn = true;
    }
    
    if ($isAuthenticated) {
      $_SESSION["yugioh-user-id"] = $row2['id'];
      
      header("Location:" . "index.php");
      exit;
    }
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
    
    <div class="container">
      <div class="row">
        <div class="col-4 col-offset-4">
          <form action="/company/final_project/register.php" method="post">
            <div style="color: red; background-color: white;"><?php if(isset($message)) { echo $message; } ?></div>
            <div class="form-group">
              <div>
                <label for="register" style="color: white;">Username</label>
              </div>
              <div>
                <input name="username" type="text" class="form-control">
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
                <input type="submit" name="register" value="register"
                  class="btn btn-primary"></span>
              </div>
            </div>
            <div class="form-group">
              <div>
                <label>Already have an account. Click <a href="/company/final_project/login.php">Here</a> to login.</label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>