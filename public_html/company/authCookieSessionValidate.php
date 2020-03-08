<?php 

$isLoggedIn = false;

// Check if loggedin session and redirect if session exists
if (! empty($_SESSION["member_id"])) {
    $isLoggedIn = true;
}
// Check if loggedin session exists
else if (! empty($_COOKIE["login_id"]) && ! empty($_COOKIE["password"]) ) {
    if($_COOKIE["login_id"] == "admin" && $_COOKIE["password"] == "password") {
        $isLoggedIn = true;
    } else {
        if (isset($_COOKIE["login_id"])) {
            setcookie("login_id", "");
        }
        if (isset($_COOKIE["password"])) {
            setcookie("password", "");
        }
    }
}
?>