<?php 

    $isLoggedIn = false;

    // if still in session
    if (! empty($_SESSION["member_id"])) {
        $isLoggedIn = true;
    }
    
    // if cookie exists
    else if (! empty($_COOKIE["login_id"]) && ! empty($_COOKIE["password"]) ) {
        if($_COOKIE["login_id"] == "admin" && $_COOKIE["password"] == "password") {
            $isLoggedIn = true;
        } else {
            // clear cookies
            if (isset($_COOKIE["login_id"])) {
                setcookie("login_id", "");
            }
            if (isset($_COOKIE["password"])) {
                setcookie("password", "");
            }
        }
    }
?>