<?php
  $url = 'https://www.shengtao.website/company/api/users/upsert-user.php';

  $cURL = curl_init();
  $postRequest = [  
    'username' => 'foo@bar.com',
    'password' => 'foobar'
  ];
  
  curl_setopt($cURL, CURLOPT_URL, $url);
  curl_setopt($cURL, CURLOPT_POST, 1);
  curl_setopt($cURL, CURLOPT_POSTFIELDS, $postRequest);
  curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
  
  curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
    'Accept: application/json'
  ));
  
  $result = curl_exec($cURL);
  $json = json_decode($result, true);
  curl_close($cURL);
  
  echo "
    <table border=\"1\" style=\"padding: 10px;\">
      <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
      </tr>
    </thead>
  ";
  print_r($json);
  echo "<tr>";
  echo "<td>". $json['id'] ."</td>";
  echo "<td>". $json['username'] ."</td>";
  
  echo "</tr>";

?>