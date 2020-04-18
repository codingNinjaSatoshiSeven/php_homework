<?php
  $url = 'http://apache/company/api/users.php';

  $cURL = curl_init();
  
  curl_setopt($cURL, CURLOPT_URL, $url);
  curl_setopt($cURL, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($cURL, CURLOPT_HTTPGET, true);
  
  curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Accept: application/json'
  ));
  
  $result = curl_exec($cURL);
  $json = json_decode($result, true);
  curl_close($cURL);
  
  echo "
    <table border=\"1\" style=\"padding: 10px;\">
      <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Homephone</th>
        <th>Cellphone</th>
      </tr>
    </thead>
  ";

  for ($counter = 0; $counter < count($json); $counter++) {
    echo "<tr>";
    foreach ($json[$counter] as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
?>