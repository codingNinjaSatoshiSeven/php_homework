<?php
  $search="Now is the time";
  print("Test string is : '$search'<br/><br/>");
  if(preg_match("/Now/", $search)) {
    print("String 'Now' was found.<br/>");
  }
  if(preg_match("/^Now/", $search)) {
    print("String 'Now' found at beginning of the line. <br/>");
  }
  if( preg_match("/Now$/", $search)) {
    print("String 'Now' found at at the end of the line.<br/>");
  }

  if( preg_match("/[[:<:]]([a-zA-Z]*ow)[[:>:]]/", $search, $match)) {
    print("Word found ending in 'ow': ". $match[1]."<br/>");
  }

  print("Words beginning with 't' found: ");
  while(preg_match("/[[:<:]](t[[:alpha:]]+)[[:>:]]/i", $search, $match)) {
    print($match[1]." ");
    $search = preg_replace($match[1], "", $search);
  }
  print("<br/>");
?>