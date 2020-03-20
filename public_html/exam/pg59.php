<?php
  print("<strong>Creating the first array</strong> <br/>");
  $first[0] = "zero";
  $first[1] = "one";
  $first[2] = "two";
  $first[] = "three";

  for ($i = 0; $i < count($first); $i++) {
    print("Element $i is $first[$i] <br />");
  }
  print("<br /><strong>Creating the second array </strong><br/>");
  $second = array("zero", "one", "two", "three");
  for($i = 0; $i< count($second); $i++) {
    print("Element $i is $second[$i] <br/>");
  }
  print("<br /><strong>Creating the third array </strong><br/>");

  $third["ArtTic"] =21;
  $third["LunaTic"] =18;
  $third["GalAnt"]=23;

  for(reset($third); $element=key($third); next($third)) {
    print("$element is $third[$element] <br />");
  }

  print("<br/> <strong>Creating the fourth array </strong><br/>");
  $a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
  );

  foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
  }
?>