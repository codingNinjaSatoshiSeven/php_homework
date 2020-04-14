<head>
<?php
  extract($_POST);
  if(!USERNAME || !PASSWORD) {
    fieldsBlank();
    die();
  }
  if(isset($NewUser)) {
    if(!($file=fopen("password.txt", "a"))) {
      print("<title>Error</title></head><body>Could not open password file</body></html>");
      die();
    }
    fputs($file, "$USERNAME, $PASSWORD \n");
    userAdded($USERNAME);
  } else {
    if(!($file = fopen("password.txt", "r"))) {
      print("<title>Error</title></head><body>Could not open password file</body></html");
      die();
    }
    $userVerified = 0;
    while(!feof($file)&& !$userVerified) {
      // read line from file
      $line = fgets($file, 255);
      //remove newline char
      $line = chop($line);
      // split username and password
      $field = explode(",", $line, 2);
      // verify username
      if($USERNAME == $field[0]) {
        $userVerified = 1;
        // call function checkPassword to verify user's password
        if(checkPassword($PASSWORD, $field) == true) {
          accessGranted($USERNAME);
        } else {
          wrongPassword();
        }
      }
    }
    // close text file
    fclose($file);
    if(!$userVerified) {
      accessDenied();
    }
  }

  function checkPassword($userpassword, $filedata) {
    if($userpassword == $filedata[1]) {
      return true;
    } else {
      return false;
    }
  }

  function userAdded($name) {
    print("
      <title>Thank you</title></head><body style=\"font-family: arial; font-size: 1em;>
      <body><strong>your have been added to the list, $name </strong></body>
    ");
  }

  function accessGranted($name) {
    print("
      <title>Thank you</title></head>
      <body><strong>Permission has been granted, $name.</strong>
    ");
  }

  function wrongPassword() {
    print("
      <title>Access Denied</title></head>
      <body><strong>You entered an invalid password.</strong>
    ");
  }

  function accessDenied() {
    print("
      <title>Access Denied</title></head>
      <body><strong>You were denied access to this server.</strong>
    ");
  }

  function fieldsBlank() {
    print("
      <title>Access Denied</title></head>
      <body><strong>Please fill in all form fields.</strong>
    ");
  }
?>