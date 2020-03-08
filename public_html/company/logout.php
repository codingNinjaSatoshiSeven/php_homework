<?php
session_start();

//Clear Session
$_SESSION["member_id"] = "";
session_destroy();

// clear cookies
if (isset($_COOKIE["login_id"])) {
    setcookie("login_id", "");
}
if (isset($_COOKIE["password"])) {
    setcookie("password", "");
}

header("Location: ./");
?>