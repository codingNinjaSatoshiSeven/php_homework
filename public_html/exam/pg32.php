<?php
  $items = file("./mydata.txt");
  foreach($items as $line) {
    $line = str_replace("\n", "", $line);
    $line = explode("\t", $line);
    print_r($line);
  }
?>