<?php
  $fruits = array("apple", "orange", "banana");
  for($i=0; $i<count($fruits); $i++) {
    if(strcmp($fruits[$i], "banana")<0) {
      print($fruits[$i]." is less than banana ");
    } elseif(strcmp($fruits[$i], "banana")>0) {
      print($fruits[$i]. " is greater than banana ");
    } else {
      print($fruits[$i]." is equal to banana ");
    }

    if($fruits[$i] < "apple") {
      print($fruits[$i]." is less than apple ");
    } elseif($fruits[$i] >"apple") {
      print($fruits[$i]. " is greater than apple ");
    } elseif($fruits[$i] == "apple") {
      print($fruits[$i]." is equal to apple ");
    }
  }
?>