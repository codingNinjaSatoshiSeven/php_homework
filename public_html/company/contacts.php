
 <html>
  <head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/company/">Yu-Gi-Oh Cards</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/company/">Home</a></li>
        <li><a href="/company/about.php">About</a></li>
        <li><a href="/company/products.php">Products</a></li>
        <li><a href="/company/news.php">News</a></li>
        <li><a href="/company/contacts.php">Contacts</a></li>
      </ul>
    </div>
  </nav>
  <div class="container" style="color: white;">
    <div class="row">
    <h1 style="color: white;">Company Contact:</h1>
    <?php

        // Show all information, defaults to INFO_ALL
        //$host = 'mysql';
        //$user = 'root';
        //$pass = 'password';
        //$conn = new mysqli($host, $user, $pass);

        //if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        //} 
        //echo "Connected to MySQL successfully!";
        $fh = fopen("contacts.txt", 'r');

        $pageText = fread($fh, 25000);

        echo nl2br($pageText);
    ?>
    </div>
  </div>
  </body>
</html>