<?php
    session_start();

    //Clear Session
    $_SESSION["yugioh-user-id"] = "";
    session_destroy();

    header("Location: ./");
?>