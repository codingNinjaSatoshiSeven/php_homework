<?php 
  session_start();

  require_once "authHelper.php";
?>
<!DOCTYPE html>
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
        <li><a href="/company/secure.php">Secure</a></li>
        <li><a href="/company/user-query.php">User Query</a></li>
        <?php if($isLoggedIn): ?>
            <li><a href="/company/logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <div id="card-container">
  <ul>
    <li>
      <a href="/company/product-detail.php?card=darkloard_morningstar">
      <div class="details">
        <h2>Darklord Morningstar</h2>
        <p>$15</p>
        <img src="https://www.cards-outlet.com/wp-content/uploads/2016/11/DESOEN029.jpg" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
      </a>
    </li>
    <li>
      <div class="details">
        <h2>Blue-eyes White Dragon</h2>
        <p>$15</p>
        <img src="https://steemitimages.com/DQmRjYD3LGUo1QV5JWPDUGGt5UMRDkajFqBzT6QSf7cy4A8/y1.jpg" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>Blue-eyes Ultimate Dragon</h2>
        <p>$25</p>
        <img src="https://sep.yimg.com/ca/I/yhst-642046970013473172247502_2618_797745015" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>Black Luster Soldier - Envoy of the Beginning</h2>
        <p>$15</p>
        <img src="https://sep.yimg.com/ca/I/yhst-642046970013473172247502_2618_1246272485" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>One For One</h2>
        <p>$5</p>
        <img src="https://sep.yimg.com/ca/I/yhst-642046970013473172247502_2618_632689849" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
  </ul>
  <ul style="margin-top: 110px">
    <li>
      <div class="details">
        <h2>Mine Golem</h2>
        <p>$5</p>
        <img src="https://i2.wp.com/www.tradingcardmint.com/wp-content/uploads/2017/07/TLM-EN018-Mine-Golem-The-Lost-Millennium-Common-Yu-gi-oh-Card.jpg?fit=445%2C650&ssl=1" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>Summoned Skull</h2>
        <p>$12</p>
        <img src="https://www.sell2bbnovelties.com/mm5/yugioh/YU_RP01EN024_480x705.jpg" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>Copy Cat</h2>
        <p>$5</p>
        <img src="https://vignette.wikia.nocookie.net/yugioh/images/2/26/Copycat-SS02-EN-C-1E.png/revision/latest?cb=20190128200200" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>Monster Reborn Reborn</h2>
        <p>$5</p>
        <img src="https://52f4e29a8321344e30ae-0f55c9129972ac85d6b1f4e703468e6b.ssl.cf2.rackcdn.com/products/pictures/1175429.jpg" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
    <li>
      <div class="details">
        <h2>Dark General Freed</h2>
        <p>$8</p>
        <img src="https://images-na.ssl-images-amazon.com/images/I/71lPLTuPYcL._AC_SY606_.jpg" style="width: 85%; height: 88%; top: 6%; left: 6%">
      </div>
    </li>
  </ul>
  </div>
  </body>
</html>