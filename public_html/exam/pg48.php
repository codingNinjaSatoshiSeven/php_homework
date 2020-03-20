<?php
  $testString = 1;
  print("$testString");
  settype($testString, "double");
  print(" as a double is $testString <br />");
  print("$testString");
  settype($testString, "integer");
  print(" as an integer is $testString <br/>");
  settype($testString, "string");
  print("Converting back to a string results in $testString <br/><br>");

  $data = "98.6 degrees";
  print("now using type casting instead: <br/>
    As a string - " .(string)$data .
    "<br/> As a double - ".(double)$data .
    "<br/> As an integer - ".(integer)$data
  );
?>