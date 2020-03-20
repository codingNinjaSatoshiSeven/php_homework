<?php
  $output = `ls -al`;
  $output = shell_exec("ls -al");
  echo "$output";
?>