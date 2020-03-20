<?php
  $a = 5;
  print("The value of variable a is $a <br />");
  //define constant value
  define("VALUE", 5);
  $a = $a + VALUE;
  print("Variable a after adding constant VALUE is $a <br/>");

  $a *=2;
  print ("Multiplying variable a by 2 yields $a <br/>");
  if($a <50) {
    print("Variable a is less than 50 <br/>");
  }
  $a += 40;
  print("Variable a after adding 40 is $a <br />");
  if($a <51) {
    print("Variable a is still 50 or less<br/>");
  } elseif($a <101) {
    print("Variable a is now between 50 and 100, inclusive<br />");
  } else {
    print("Variable a is now greater than 100 <br />");
  }
  print("Using a variable before initializing: $nothing <br />");
  $test = $num + VALUE;
  print("An uninitiqlized variable plus constants VALUE yeilds $test <br />");

  $str = "3 dolloars";
  $a += $str;
  print("Adding a string to variable a yields $a <br />");
?>