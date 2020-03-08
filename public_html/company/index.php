<?php
session_start();

require_once "authCookieSessionValidate.php";

if ($isLoggedIn) {
    header("Location:" . "dashboard.php");
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
        
        header("Location:" . "dashboard.php");
        exit;
    } else {
        $message = "Invalid Login";
    }
}
?>
<style>
body {
    font-family: Arial;
}

#frmLogin {
    padding: 20px 40px 40px 40px;
    background: #d7eeff;
    border: #acd4f1 1px solid;
    color: #333;
    border-radius: 2px;
    width: 300px;
}

.field-group {
    margin-top: 15px;
}

.input-field {
    padding: 12px 10px;
    width: 100%;
    border: #A3C3E7 1px solid;
    border-radius: 2px;
    margin-top: 5px
}

.form-submit-button {
    background: #3a96d6;
    border: 0;
    padding: 10px 0px;
    border-radius: 2px;
    color: #FFF;
    text-transform: uppercase;
    width: 100%;
}

.error-message {
    text-align: center;
    color: #FF0000;
}
</style>

<form action="" method="post" id="frmLogin">
    <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
    <div class="field-group">
        <div>
            <label for="login">Username</label>
        </div>
        <div>
            <input name="login_id" type="text"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <label for="member_password">Password</label>
        </div>
        <div>
            <input name="password" type="password"
                class="input-field">
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="checkbox" name="remember" id="remember"
                <?php if(isset($_COOKIE["member_login"])) { ?> checked
                <?php } ?> /> <label for="remember-me">Remember me</label>
        </div>
    </div>
    <div class="field-group">
        <div>
            <input type="submit" name="login" value="Login"
                class="form-submit-button"></span>
        </div>
    </div>
</form>