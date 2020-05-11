<?php 
  $isLoggedIn = false;

  // if still in session
  if (!empty($_SESSION["yugioh-user-id"])) {
    $isLoggedIn = true;
  }
?>